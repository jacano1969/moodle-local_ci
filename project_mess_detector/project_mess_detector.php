<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Simple wrapper over the phpmd PECL tool (mess detector)
 * http://phpmd.org
 *
 * This script looks for various mess analysis (codesize, design, naming,
 * unused) - by default we execute all reporting them in PMD format
 * so can be processed later by some PMD tools. Useful to build some CI jobs
 * on top of it.
 *
 * @package    core
 * @subpackage ci
 * @copyright  2011 Eloy Lafuente (http://stronk7.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Increase memory, codebase is huge
ini_set('memory_limit', '4096M');

// Prevent the default timezone msg
if (function_exists('date_default_timezone_set') and function_exists('date_default_timezone_get')) {
    $olddebug = error_reporting(0);
    date_default_timezone_set(date_default_timezone_get());
    error_reporting($olddebug);
    unset($olddebug);
}

require_once 'PHP/PMD/TextUI/Command.php';
exit(PHP_PMD_TextUI_Command::main($argv));
