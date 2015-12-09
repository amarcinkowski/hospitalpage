<?php
use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\MinkExtension\Context\MinkContext;
// use Behat\Behat\Context\TranslatedContextInterface,
// use Behat\Gherkin\Node\PyStringNode,
// Behat\Gherkin\Node\TableNode;

/**
 * Features context.
 */
class FeatureContext extends MinkContext {
	
	/**
	 * constr
	 */
	public function __construct() {
		// instantiate context
	}
	
	/**
	 * @BeforeFeature
	 */
	public static function prepareForTheFeature() {
		// clean database or do other preparation stuff
	}
	

  /**
   * @AfterStep
   */
  public function takeScreenShotAfterFailedStep(AfterStepScope $scope)
  {
  	  $fileName = date('d-m-y') . '-' . uniqid() . '.png';
  	  $this->saveScreenshot($fileName, getenv("HOME"));
  }
  
	/**
	 * @Given we have some context
	 */
	public function prepareContext() {
		// do something
	}
	
	/**
	 * @When event occurs
	 */
	public function doSomeAction() {
		// do something
	}
	
	/**
	 * @Then something should be done
	 */
	public function checkOutcomes() {
		// do something
	}
	
	/**
	 * @Given /^otwieram na ([^"]*)$/
	 */
	public function iOpenOnDevice($argument) {
		// doSomethingWith($argument);
		echo "Otwarto na: " . $argument;
		if ($argument == "smartfonie") {
			$this->getSession()->resizeWindow(320, 480, 'current');
		} else if ($argument == "tablecie") {
			$this->getSession()->resizeWindow(1024, 768, 'current');
		} else {
			$this->getSession()->resizeWindow(1280, 1024, 'current');
		}
	}
}
