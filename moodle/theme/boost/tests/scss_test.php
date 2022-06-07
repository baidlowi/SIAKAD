<?php

defined('MOODLE_INTERNAL') || die();

/**
 * Unit tests for scss compilation.
 *
 * @package   theme_boost
 * @copyright 2016 onwards Ankit Agarwal
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class theme_boost_scss_testcase extends advanced_testcase {
    /**
     * Test that boost can be compiled using SassC (the defacto implemention).
     */
    public function test_scss_compilation_with_sassc() {
        if (!defined('PHPUNIT_PATH_TO_SASSC')) {
            $this->markTestSkipped('Path to SassC not provided');
        }

        $this->resetAfterTest();
        set_config('pathtosassc', PHPUNIT_PATH_TO_SASSC);

        $this->assertNotEmpty(
            theme_config::load('boost')->get_css_content_debug('scss', null, null)
        );
    }
}
