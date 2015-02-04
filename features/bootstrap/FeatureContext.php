<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    protected $app;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $app = require __DIR__.'/../../src/app.php';
        require __DIR__.'/../../config/test.php';
        $this->app = $app;
    }

    /** @BeforeScenario */
    public static function prepareForTheFeature() {
        $schema = __DIR__.'/../../data/schema.db';
        $target = __DIR__.'/../../data/app_test.db';

        if (file_exists($target)) {
            unlink($target);
        }
        copy($schema, $target);
    }

    /**
     * @Given /we have the following characters?:/
     */
    public function weHaveTheFollowingCharacters(TableNode $table)
    {
        foreach ($table as $row) {
            $this->app['powermash.add_character']($row['id'], $row['name'], $row['picture']);
        }
    }
}
