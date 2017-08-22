<?php

/**
 * Ztext original (version 1.1.0)
 * Copyright (C) 2016-2017  B. Zoltán Gorza
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

/** Standard namespace. Not necessary, but recommended. */
namespace Ztext;

// NOTE constant's naming: 3 letter for constant type (i.e. what it is for),
// others are the name (for more prefix, use <prefix>_<rest of the name> format)

// NOTE use 4 length tabs!

// NOTE Please maximize the line length to 80 characters!

/*
 * Flags -----------------------------------------------------------------------
 */

/**
 * Fullprocess.
 *
 * If it's set, any other processing flag has no effect.
 */
const FLG_PRO_FULL = 'P';
/** Preprocess. It's ignored when FLG_PRO_FULL or FLG_PRO_TEXT is set. */
const FLG_PRO_PRE = 'E';
/** Midprocess (aka process). */
const FLG_PRO_MID = 'M';
/** Finprocess. */
const FLG_PRO_FIN = 'N';
/** Textprocess (like fullprocess for text output). */
const FLG_PRO_TEXT = 'T';
/**
 * Midtextprocess (like process AND finprocess, but for text output).
 * If it's set, FLG_PRO_MID and FLG_PRO_FIN have no effect.
 */
const FLG_PRO_MIDTEXT = 'S';
const FLG_PRO_FINTEXT = 'X';

/** Disable default frames (an article.ztext will be given anyway). */
const FLG_FRAME_OFF = 'F';

# TODO: add buttons
/** Allow every kind of buttons */
//const FLG_BUT_ALL = 'B';
/** Allow download buttons. */
//const FLG_BUT_DL = 'D';
/** Allow control buttons. */
//const FLG_BUT_CTRL = 'C';

/**
 * Adds a first level header (h1).
 * If it's set, any other header flag has no effect!
 */
const FLG_HEAD_1ST = 'H';
/**
 * Adds a second level header (h2).
 * If it's set, FLG_HEAD_3RD and FLG_HEAD_4TH have no effect!
 */
const FLG_HEAD_2ND = 'I';
/**
 * Adds a third level header (h3).
 * If it's set, FLG_HEAD_4TH has no effect!
 */
const FLG_HEAD_3RD = 'J';
/** Adds a fourth level header (h4). */
const FLG_HEAD_4TH = 'K';

/**
 * Won't remove the hidden blocks (by default, it isn't even in the HTML).
 * It does NOT have any effect on alternate and collapseable blocks!
 */
const FLG_SHOW_HIDDEN = 'R';
/**
 * JavaScript-free mode.
 *
 * Output will be printed in hybrid mode (same as FLG_MODE_HYBRID) and won't add
 * any button.
 */
const FLG_JS_OFF = 'O';
/**
 * It will ignore every alternate blocks (they'll be handled as hidden blocks).
*/
const FLG_IGNORE_ALT = 'A';
/**
 * Show Alternate blocks as normal text.
 * Doesn't work when FLG_IGNORE_ALT or JS_OFF is on!
 */
const FLG_ALT_AS_NORMAL = 'L';
/**
 * The output will be printed in hybrid mode. That means everything will be
 * properly processed, but alternates and collapseable's collapsed texts will
 * be below the text as a footbar.
 */
const FLG_MODE_HYBRID = '0';

/*
 * End of flags ----------------------------------------------------------------
 *                              No const's land
 * Block keys ------------------------------------------------------------------
 */

/** Italic block (italy is originally a typo that became an in-joke. */
const BLK_ITALY = 'it';
/**
 * Normal block (it's the default, unsigned).
 * It's value is 'no', as no style. Got it? Ha-ha!
 */
const BLK_NORMAL = 'no';
/**
 * Signed normal block. Same as Normal, except it has an inner function for
 * HTML content within your ztext text. It's recommended to use!
 */
const BLK_NORMAL2 = 'n2';
/** Bold block. */
const BLK_BOLD = 'bo';
/** Linethrough block. */
const BLK_LINETHROUGH = 'lt';
/** First class title (won't be <h1>). */
const BLK_TITLE = 't1';
/** Second class title (won't be <h2>). */
const BLK_SUBTITLE = 't2';
/** Third class title (won't be <h3>). */
const BLK_SUBSUBTITLE = 't3';
/** Comment block (with a full inner-processing within it). */
const BLK_COMMENT = 'cm';
/** One line comment. */
const BLK_ALINECOMM = 'ac';
/** Code block (like the quote block, but with a monospace font). */
const BLK_CODE = 'co';
/** Quote block. */
const BLK_QUOTE = 'qu';
/** Warning block; it'll be a big ass red sign in the center. */
const BLK_WARNING = 'wa';
/**
 * Collapseable block, that is and expandable block. In zxto,
 * the basic text and the collapsed text are separated by CHR_SEP.
 */
const BLK_COLLAPSEABLE = 'ca';
/** Alternate blocks, that's why this markup language for. */
const BLK_ALTERNATE = 'al';
/** Same as BLK_ALTERNATE, but there are others like me (lazy coders). */
const BLK_ALT = BLK_ALTERNATE;
/** Links (linked think is in an alternate block after it). */
const BLK_LINK = 'li';
/** Hidden blocks, that's very gentle; it says 'hi'! */
const BLK_HIDDEN = 'hi';
/**
 * AS IS block, it'll return everything from this block as it is.
 * Only the reserved characters of HTML will be converted to HTML entities.
 */
const BLK_ASIS = 'as';

/*
 * End of Block keys -----------------------------------------------------------
 *                               No man's land
 * Block type keys -------------------------------------------------------------
 */

// Opening and closing signs -----------

/** Block's open sign. */
const BTK_OPEN_SIGN = 'oo';
/** Block's close sign. */
const BTK_CLOSE_SIGN = 'oc';
/** Block's alternate open sign for plain text output. */
const BTK_ALT_OPEN_SIGN = 'ao';
/** Block's alternate close sign for plain text output. */
const BTK_ALT_CLOSE_SIGN = 'ac';

// Datas for HTML output ---------------

/** Block's class for CSS formatting. */
const BTK_CLASS = 'cl';
/** Block's additional name (actually id) postfix, I don't know what for. */
const BTK_NAME_POSTFIX = 'pf';

// Other -------------------------------

/** Block's visibility. */
const BTK_IS_BLOCK = 'ib';

/** Block's inner processing function. */
const BTK_INNER_FUNCTION = 'if';

/*
 * End of Block type keys ------------------------------------------------------
 *                          Another no man's land
 * Globals ---------------------------------------------------------------------
 */

/**
 * The global counter for Block's names (mostly for span names in HTML output).
 * Use it if you want to get it's value, but not to set.
 * Do NOT use this variable directly within any processing; use the y()
 * function instead (that will return it's value and increment it) OR
 * the y_to_value() function (that will set this variable to a given value --
 * IS NOT recommended to use!).
 */
$global_y = 0;

/**
 * Type of blocks.
 *
 * It defines the opening and closing sings, class names, alternate o. and c.
 * signs (for plain text outputs) and the infuns (inner functions).
 *
 * Structure:
 *      original open sign          (oo) => string,
 *      original close sign         (oc) => string,
 *      alternate open sign         (ao) => string,
 *      alternate close sign        (ac) => string,
 *      class                       (cl) => string   # for HTML,
 *      name postfix                (pf) => string   # for HTML,
 *      is_block                    (ib) => bool     # for some outputs,
 *      [inner function             (if) => function # for postprocess];
 */
$blocktypes = array(
    /* template
	'oo' =>
	'oc' =>
	'ao' =>
	'ac' =>
	'cl' =>
	'pf' =>
	'ib' =>
	'if' =>
	*/

    BLK_ITALY => array(
        'oo' => '"',
        'oc' => '"',
        'ao' => '"',
        'ac' => '"',
        'cl' => 'italy',
        'pf' => 'i',
        'ib' => true,
        'if' => function ($text, $alt, $plain = false) {
            if (!$plain) {
                $alt = normal_within_italy($alt);

                return array(normal_within_italy($text),
                             (  (isset($text[1]) && ($text[0].$text[1] == "''"))
                              && (substr($text, -2) == "''"))
                             ? ("''" . $alt . "''")
                             : $alt
                );
            } else {
                return array(
                    str_replace("|", "'", $text),
                    str_replace("|", "'", $alt)
                );
            }
        }
    ),

    BLK_NORMAL => array( // default, unsigned
        'ao' => '',
        'ac' => '',
        'cl' => 'normal',
        'pf' => 'n',
        'ib' => true
    ),

    BLK_NORMAL2 => array(
        'oo' => '|',
        'oc' => '|',
        'ao' => '',
        'ac' => '',
        'cl' => 'normal',
        'pf' => 'n',
        'ib' => true,
        'if' => function ($text, $alt, $plain = false) {
            $text = process_within_normal($text, $plain);
            $alt = process_within_normal($alt, $plain);

            return array(
                $text,
                $alt
            );
        }
    ),

    BLK_BOLD => array(
        'oo' => '~',
        'oc' => '~',
        'ao' => '*',
        'ac' => '*',
        'cl' => 'bold',
        'pf' => 'b',
        'ib' => true
    ),

    BLK_LINETHROUGH => array(
        'oo' => '---',
        'oc' => '---',
        'ao' => '[DELETED: ',
        'ac' => ']',
        'cl' => 'linethrough',
        'pf' => 'lt',
        'ib' => true
    ),

    BLK_TITLE => array(
        'oo' => '__',
        'oc' => '__',
        'ao' => '__',
        'ac' => '__',
        'cl' => 'title',
        'pf' => 'h',
        'ib' => true
    ),

    BLK_SUBTITLE => array(
        'oo' => '___',
        'oc' => '___',
        'ao' => '___',
        'ac' => '___',
        'cl' => 'subtitle',
        'pf' => 'hh',
        'ib' => true
    ),

    BLK_SUBSUBTITLE => array(
        'oo' => '____',
        'oc' => '____',
        'ao' => '____',
        'ac' => '____',
        'cl' => 'subsubtitle',
        'pf' => 'hhh',
        'ib' => true
    ),

    BLK_COMMENT => array(
        'oo' => '(++',
        'oc' => '++)',
        'ao' => '/* ',
        'ac' => ' */',
        'cl' => 'comm',
        'pf' => 'c',
        'ib' => true,
        'if' => function ($text, $alt, $plain = false) {
            if (!$plain) {
                return array(
                    process($text, false, 'comm',
                            false, true, false, BLK_COMMENT),
                    process($alt, false, 'comm',
                            false, true, false, BLK_COMMENT)
                );
            } else {
                return array(
                    midtextprocess($text, false, true, false, BLK_COMMENT),
                    midtextprocess($alt, false, true, false, BLK_COMMENT)
                );
            }
        }
    ),

    BLK_ALINECOMM => array(
        'oo' => '!++',
        'oc' => "\n",
        'ao' => '// ',
        'ac' => '',
        'cl' => 'alinecomm',
        'pf' => 'lc',
        'ib' => true,
        'if' => function ($text, $alt, $plain = false) {
            if (preg_match("/\[.*\]/", $text, $res)) {
                $alt = substr($res[0], 1, strlen($res[0]) - 2);
                $text = substr($text, 0, strpos($text, '['));
            }

            if (!$plain) {
                return array(
                    rtrim($text)."\n",
                    $alt ? $alt."\n" : ''
                );
            } else {
                return array(
                    rtrim($text).($alt ? ' ' : "\n"),
                    $alt ? $alt."\n" : ''
                );
            }
        }
    ),

    BLK_CODE => array(
        'oo' => '``',
        'oc' => '``',
        'ao' => "\n[CODE]\n",
        'ac' => "\n[ENDOFCODE]\n",
        'cl' => 'code',
        'pf' => 'cd',
        'ib' => true,
        'if' => function ($text, $alt, $plain = false) {
            $text = trim($text);

            if (!$plain) {
                return array(
                    htmlspecialchars($text),
                    ''
                );
            } else {
                return array(
                    $text,
                    ''
                );
            }
        }
    ),

    BLK_QUOTE => array(
        'oo' => ')(',
        'oc' => '"',
        'ao' => "\n\"\"\"\n",
        'ac' => "\n\"\"\"\n",
        'cl' => 'quote',
        'pf' => 'q',
        'ib' => true,
        'if' => function ($text, $alt, $plain = false) {
            $text = trim($text);

            if (!$plain) {
                if ($alt) {
                    return array(
                        "<span id='" . y(true) . "-quote' class='text'>"
                        . "$text</span>"
                        . "<span id='" . y(true) . "-quote' class='from'>"
                        . "&nbsp;&dash;&dash;&nbsp;$alt</span>",
                        ''
                    );
                } else {
                    return array($text, '');
                }
            } else {
                if ($alt) {
                    return array("$text\n\n-- $alt", '');
                } else {
                    return array($text, '');
                }
            }
        }
    ),

    BLK_WARNING => array(
        'oo' => '.!.',
        'oc' => '.!.',
        'ao' => '!!! ',
        'ac' => ' !!!',
        'cl' => 'warning',
        'pf' => 'w',
        'ib' => true,
        'if' => function ($text, $alt, $plain = false) {
            $text = trim($text, " \n\t");

            if (!$plain) {
                $text = "<span id='" . y(true) . "-warntitle' class='text'>"
                      . "$text</span>";
                if ($alt) {
                    return array(
                        $text
                        . "<span id='" . y(true) . "-warntext' class='desc'>"
                        . "$alt</span>",
                        ''
                    );
                } else {
                    return array($text, '');
                }
            } else {
                return array(
                    strtoupper($text),
                    $alt
                );
            }
        }
    ),

    BLK_COLLAPSEABLE => array(
        'oo' => '?.',
        'oc' => '.?',
        'ao' => '[[',
        'ac' => ']]',
        'cl' => 'coll',
        'pf' => 'cl',
        'ib' => true,
        'if' => function ($text, $alt, $plain = false) {
            $tmp = explode(CHR_SEP, $text, 2);
            $tmp[0] = trim($tmp[0]);
            $tmp[1] = trim($tmp[1]);

            if (!$plain) {
                if (count($tmp) == 2) {
                    if ($plain != FLG_MODE_HYBRID) {
                        return array(
                            "<span id='" . y(true) . "-coll' class='clickcoll'"
                            . ">" . $tmp[0] . "</span>"
                            . "<span id='" . y() . "-collcontent' class="
                            . "'collcontent'>" . process($tmp[1], false, 'coll',
                                                        false, true, false)
                            . '</span>',
                            ''
                        );
                    } else {
                        return array(
                            $tmp[0],
                            process($tmp[1], false, 'coll', false, true, false)
                        );
                    }
                } else {
                    return array(
                        $tmp[0],
                        ''
                    );
                }
            } else {
                if (count($tmp) == 2) {
                    return array(
                        $tmp[0],
                        textprocess($tmp[1], false, true, false)
                    );
                } else {
                    return array(
                        $tmp[0],
                        '');
                }
            }
        }
    ),

    BLK_ALTERNATE => array(
        'oo' => '[',
        'oc' => ']',
        'ao' => '[',
        'ac' => ']',
        'cl' => 'alt',
        'pf' => 'a',
        'ib' => true
    ),

    BLK_LINK => array(
        'oo' => '((',
        'oc' => '))',
        'ao' => '(',
        'ac' => ')',
        'cl' => 'link',
        'pf' => 'l',
        'ib' => true,
        'if' => function ($text, $alt, $plain = false) {
            if (!$plain) {
                if ($alt) { # alt contains the link
                    return array(
                    "<a href='$alt' target='_blank'>$text</a>",
                    ''
                    );
                } else {
                    return array($text, '');
                }
            } else {
                return array(
                    $text,
                    $alt
                );
            }
        }
    ),

    BLK_HIDDEN => array(
        'oo' => '{',
        'oc' => '}',
        'ao' => '{',
        'ac' => '}',
        'cl' => 'hidden',
        'pf' => 'h',
        'ib' => false
    ),

    BLK_ASIS => array(
        'oo' => '\\=',
        'oc' => '=\\',
        'ao' => '\\',
        'ac' => '\\',
        'cl' => 'asis',
        'pf' => 'ai',
        'ib' => true,
        'if' => function ($text, $alt, $plain) {
            if (!$plain) {
                return array(
                    str_replace('-', '&dash;', htmlspecialchars($text)),
                    str_replace('-', '&dash;', htmlspecialchars($alt))
                );
            } else {
                return array($text, $alt);
            }
        }
    )
);

// Special characters ------------------

/** Used escape character within your Ztext document. */
const CHR_ESC = '^';
/** Used separator string within collapseable blocks. */
const CHR_SEP = '///';

// Dummy type keys ---------------------

/** Name key for dummy block type dictionaries. See: get_dummy_types() */
const DUM_NAME = 'n';
/** Close sign key for dummy block type dictionaries. See: get_dummy_types() */
const DUM_CS = 'c';

// Processing options ------------------

/** Processing's output will be string (HTML or plain text). */
const PRO_OUT_STRING = 's';
/**
 * Processing's output will be a Blocks instance (string output will be
 * given manually from this instance).
 */
const PRO_OUT_BLOCKS_INSTANCE = 'b';
/** Processing's output will be printed immediatly. */
const PRO_OUT_PRINT = 'p';
/** It'll write the original string too (below the processed string). */
const PRO_OUT_ORIGINAL = 'o'; # NOTE unused yet
/** Output will be (valid) HTML */
const PRO_METHOD_HTML = 'h';
/** Output will be plain text */
const PRO_METHOD_TEXT = 't';
/**
 * The processing will clear the used Blocks instance. If you want Blocks
 * output, you'll get a clone of this instance (that will be cleared after
 * cloning).
 */
const PRO_CLEAR_BLOCKS = 'c';
/** Array of replaces for preprocess. */
const PRO_REPLACE_PRE = array(
    '<q>' => "''",
    "\r" => ''
);
/** Array of replaces for finprocess. */
const PRO_REPLACE_FIN = array(
    "''" => '"',
    ">\n<" => '><',
    "\n" => "\n<br>",
    '--' => '&ndash;',
    '  ' => ' ',
    "\t" => '&nbsp;&nbsp;&nbsp;&nbsp;'
);
/** Array of replaces for textprocess. */
const PRO_REPLACE_TEXT = array(
    "''" => '"',
    '""' => '"',
    " \n" => "\n",
    "\n" => "\r\n",
    '--' => '–',
    '  ' => ' ',
    '<hr>' => '----------------------------------------'
);

// Names -------------------------------

/** Link's id prefix. */
const NAM_BOOKMARK = 'meow'; # bookmark -> bmark -> bark -> meow
/** Footbar link's id prefix. */
const NAM_BOOKMARK_FOOTBAR = 'foot-';
/** Button's id prefix. */
const NAM_BUTTON = 'but';
/** Control button's id prefix. */
const NAM_BUTTON_CTRL = 'ctrl-';
/** Download button's id prefix. */
const NAM_BUTTON_DL = 'dl-';

// Separators --------------------------

/** Separator character between footbar and text. */
const SEP_FOOTBAR_CHAR = '&dash;';
/** Separator character between footbar and text in text-output. */
const SEP_FOOTBAR_CHAR_FOR_TEXT = '-';
/** Length of separator (i.e. number of separator characters). */
const SEP_FOOTBAR_LENGTH = 14;

// Download ----------------------------

/** Locations of a general download script (default: Ztext/ztext_dl.php). */
// const DLO_SCRIPT_LOC = 'Ztext/ztext_dl.php';

/*
 * End of Globals --------------------------------------------------------------
 *                              !Everybody' Land
 * Magic functions -------------------------------------------------------------
 */

/**
 * You don't have to believe in magic; this IS the magic!
 *
 * To be serious, this is the ztext's main function.
 * It'll read and process you're text from a file.
 *
 * @param $fname Filename
 * @param $fdir Directory (default: '.')
 * @param $add_class Additional class (default: 'Ztext')
 * @param $fext File extension (default: '.txt')
 * @return string Processed text within a frame in HTML format
 */
function magic($fname, $fdir = '.', $add_class = 'Ztext', $fext = '.txt') {
    $filetext = readafile($fname, $fdir, $fext);

    return magic2($filetext, $fname, $add_class);
}

/**
 * Lower kind of magic, if you've got the text.
 *
 * @param $text The text to be processed
 * @param $header Header
 * @param $add_class Additional class (default: 'Ztext')
 * @return string Processed text within a frame in HTML format
 */
function magic2($text, $header, $add_class = 'Ztext') {
    $out = add_header($header, FLG_HEAD_1ST, $add_class)
         . "<section class='$add_class'>"
         . fullprocess($text)
         . '</section>';

    return frame($out, false, $add_class);
}

/**
 * This is the most powerful kind of magic (and the newest as well).
 *
 * It has more features than other kind of magics (via $flags), although it
 * lacks the file reading function.
 *
 * By default, it returns a fully processed $text with a first class header
 * within frames (without additional classes -- that's changed) via magic2().
 * If you pass any flags, this funtion will do exactly that you want. So if you
 * don't pass any clue for processing (FLG_PRO_*), it's possible that your
 * text won't be processed anyway.
 *
 * You should check the useable flags within the generated documentation
 * (if it will be written) or within this PHP file (constants with FLG prefix).
 *
 * @param $text Text to be processed
 * @param $header Header if needed (default: '')
 * @param $add_class Additional class(es) (default: '')
 * @param $flags Flags (every following parameter)
 * @return Processed text within a HTML frame
 */
function nu_magic($text, $header = '', $add_class = '', ...$flags) {
    if (empty($flags)) {
        return magic2($text, $header, $add_class);
    }

    $out = ''; # Output, processed text
    $is_hybrid = in_array(FLG_MODE_HYBRID, $flags);
    $frame_needed = !in_array(FLG_FRAME_OFF, $flags);
    $show_hidden = in_array(FLG_SHOW_HIDDEN, $flags);
    $ignore_alt = in_array(FLG_IGNORE_ALT, $flags);
    $alt_as_normal = in_array(FLG_ALT_AS_NORMAL, $flags);
    $textout = true;

    // buttons
    # TODO: add buttons
    //$but = ''; # Buttons
    //$buttons_all = in_array(FLG_BUT_ALL, $flags);
    //$ctrl_buttons = $buttons_all ?: in_array(FLG_BUT_CTRL, $flags);
    //$dl_buttons = /* $buttons_all ?: */ in_array(FLG_BUT_DL, $flags);

    // header
    if ($header) {
        foreach (array(FLG_HEAD_1ST,
                       FLG_HEAD_2ND,
                       FLG_HEAD_3RD,
                       FLG_HEAD_4TH) as $h) {
            if (in_array($h, $flags)) {
                $out .= add_header($header, $h, $add_class, $frame_needed);
                break;
            }
        }
    }

    // processing
    if (in_array(FLG_PRO_FULL, $flags)) {
        $text = fullprocess($text, $is_hybrid, '', $show_hidden,
                            $ignore_alt, $alt_as_normal);
        $textout = false;
    } else {
        if (in_array(FLG_PRO_TEXT, $flags)) {
            $text = textprocess($text, $show_hidden,
                                $ignore_alt, $alt_as_normal);
            $textout = true;
        } else {
            if (in_array(FLG_PRO_PRE, $flags)) {
                $text = preprocess($text);
            }

            if (in_array(FLG_PRO_MID, $flags)) {
                $text = process($text, $is_hybrid, '', $show_hidden,
                                $ignore_alt, $alt_as_normal);
                $textout = false;
            } elseif (in_array(FLG_PRO_MIDTEXT, $flags)) {
                $text = midtextprocess($text, $show_hidden,
                                       $ignore_alt, $alt_as_normal);
                $textout = true;
            }

            if (in_array(FLG_PRO_FIN, $flags)) {
                $text = finprocess($text);
            } elseif (in_array(FLG_PRO_FINTEXT, $flags)) {
                $text = fintextprocess($text);
            }
        }
    }

    if ($frame_needed) {
        $out .= "<section class='"
              . "text" . ($add_class ? " $add_class" : '')
              . "'>$text</section>";
    } else {
        $out .= $text;
    }

    return frame($out, $textout, $add_class);
}

/**
 * Magic for text output.
 *
 * It reads your text from a file and returns a plain text output.
 *
 * @param $fname Filename
 * @param $fdir Directory
 * @param $fext File's extension
 * @return string Processed text in plain text format
 */
function textmagic($fname, $fdir = '.', $fext = '.txt') {
    return $fname . "\n\n" . textprocess(readafile($fname, $fdir, $fext));
}

/**
 * Magic2 for text output.
 *
 * Same as textmagic, except the text is gotten from argument, not from a file.
 *
 * @param $ftext The text to be processed
 * @param $title Title of your text. If isn't given, won't be written
 * (default: '')
 * @return string Processed text in plain text format
 */
function textmagic2($ftext, $fname = '') {
    if (   ($fname)
        && ($fname != '0')) {
        return $fname . "\n\n" . textprocess($ftext);
    } else {
        return textprocess($ftext);
    }
}

/*
 * End of Magics ---------------------------------------------------------------
 *                         not (not everybody's land)
 * Classes ---------------------------------------------------------------------
 */

/**
 * This class is for one single block, contain's every needed data and method
 * (again, for ONE block).
 *
 * It isn't used directly, the Blocks class handle these instances.
 */
class Block {

    /**
     * Block's unique id
     */
    private $_id;

    /**
     * Block's style
     */
    private $_style;

    /**
     * Block's style's name
     */
    private $_style_name;

    /**
     * Block's content
     */
    private $_content;

    /**
     * Block's alternate content
     */
    private $_alternate;

    /**
     * @param $id Block's id
     * @param $style Block's style's name (default: normal)
     */
    public function __construct($id, $style = null) {
        $this->_id = $id;

        global $blocktypes;
        if ($style) {
            $this->_style_name = $style;
            $this->_style = $blocktypes[$style];
        } else {
            $this->_style_name = BLK_NORMAL;
            $this->_style = $blocktypes[BLK_NORMAL];
        }

        $this->_content = '';
        $this->_alternate = '';
    }

    /** Returns the id. */
    public function get_id() {
        return $this->_id;
    }

    /**
     * Set a new id. Highly recommended to ignore this function and never use!
     *
     * @param $nu_id The new id
     */
    public function set_id($nu_id) {
        $this->_id = $nu_id;
    }

    /**
     * @return The Block's style's name
     */
    public function get_style_name() {
        return $this->_style_name;
    }

    /**
     * @param $attr The needed style attribute
     * @return The  style or an attribute of style (if $attr wasn't given)
     */
    public function get_style($attr = "") {
        if ($attr) {
            return $this->_style[$attr] ?: "WRONG ATTRIBUTE";
        } else {
            return $this->_style;
        }
    }

    /**
     * Set a new style for block. If the style isn't valid (in $blocktypes),
     * it will do nothing.
     *
     * @param $style New style
     */
    public function set_style($style) {
        global $blocktypes;
        if (array_key_exists($style, $blocktypes)) {
            $this->_style = $blocktypes[$style];
            $this->_style_name = $style;
        }
    }

    /**
     * Set an attribute of the current style.
     *
     * @param $attr Attribute (use BLK_* constants!)
     * @param $nu_value New value of this attribute
     */
    public function set_style_attribute($attr, $nu_value) {
        $this->_style[$attr] = $nu_value;
    }

    /**
     * @return The close sign (oc) of the block's style
     */
    public function get_close_sign() {
        return $this->_style[BTK_OPEN_SIGN];
    }

    /**
     * Get or set the content.
     *
     * @param $input The text to be concatenated
     * @return The content (if $input is empty and not '0')
     */
    public function getset_content($input = "") {
        if (empty($input) && $input != '0') {
            return $this->_content;
        } else {
            $this->_content .= $input;
        }
    }

    /**
     * @return Length of content
     */
    public function get_content_length() {
        return strlen($this->_content);
    }

    /**
     * Get or set the alternate text.
     *
     * @param $input The text to be concatenated
     * @return The content (if $input is empty and not '0')
     */
    public function getset_alternate($input = "") {
        if (empty($input) && $input != '0') {
            return $this->_alternate;
        } else {
            $this->_alternate .= $input;
        }
    }

    /**
     * @return Length of alternate
     */
    public function get_alternate_length() {
        return strlen($this->_alternate);
    }

    /**
     * If the block's style has an inner function, this function calls it.
     */
    private function _style_function($txt = false) {
        if (isset($this->_style[BTK_INNER_FUNCTION])) {
            $tmp = call_user_func($this->_style[BTK_INNER_FUNCTION],
                                  $this->_content,
                                  $this->_alternate,
                                  $txt);
            $this->_content = $tmp[0];
            $this->_alternate = $tmp[1]; # using list? set also alternate here?
        }
    }

    /**
     * It returns the whole block as one (or two) simple HTML span.
     *
     * @param $alt The alternate text (default: "")
     * @param $namepostfix Additional nameprefix (default: "")
     * @param $show_hidden Show hidden blocks (default: false)
     * @return A string of this block as HTML
     */
    public function get_block_as_HTML(
        $namepostfix = "",
        $alt = null,
        $alt_as_normal = false,
        $ignore_alt = false
    ) {
        if (!$this->_style[BTK_IS_BLOCK]) {
            return '';
        }

        if ($alt) {
            $this->_alternate = $alt;
        }
        $this->_style_function();
        if ($ignore_alt) {
            $this->_alternate = '';
        }

        # TODO don't add span tags for BLK_NORMAL (but add for BLK_NORMAL2)

        if ($this->_content) {
            $namepostfix = ($namepostfix
                         ? $this->_style[BTK_NAME_POSTFIX] . '-' . $namepostfix
                         : $this->_style[BTK_NAME_POSTFIX]);
            $out = "<span "
                 .   "id='{$this->_id}-{$namepostfix}' "
                 .   "class='{$this->_style[BTK_CLASS]}"
                 .   ($this->_alternate && !$alt_as_normal ? " iactive" : "")
                 . "'"
                 . ">" . $this->_content . "</span>";

            if ($this->_alternate) {
                return $out
                     . "<span " # the only used id prefix is the 'a'
                     .   "id='a{$this->_id}-{$namepostfix}' "
                     .   "class='{$this->_style[BTK_CLASS]}"
                     . (!$alt_as_normal ? " alt iactive" : '') . "'"
                     . ">" . $this->_alternate . "</span>";
            } else {
                return $out;
            }
        } else {
            return "";
        }
    }

    /**
     * Returns a processed text in HTML format, but alternates will be in
     * the footbar.
     *
     * @param $namepostfix Name postfix (aka profix)
     * @param $alt Alternate text (default: "")
     */
    public function get_block_as_hybrid(
        $namepostfix = "",
        $alt = null
    ) {
        if (!$this->_style[BTK_IS_BLOCK]) {
            return array('', null);
        }

        if ($alt) {
            $this->_alternate = $alt;
        }
        $this->_style_function(FLG_MODE_HYBRID);

        # TODO don't add span tags for BLK_NORMAL (but add for BLK_NORMAL2)

        if ($this->_content) {
            $namepostfix = ($namepostfix
                          ? $this->_style[BTK_NAME_POSTFIX] . '-' . $namepostfix
                          : $this->_style[BTK_NAME_POSTFIX]);
            $out = "<span "
                 .   "id='" . "{$this->_id}-{$namepostfix}' "
                 .   "class='{$this->_style[BTK_CLASS]}'"
                 . ">" . $this->_content . "</span>";

            if ($this->_alternate) {
                return array($out, $this->_alternate);
            } else {
                return array($out, null);
            }
        } else {
            return array('', null);
        }
    }

    /**
     * It returns the whole block in a plain text format.
     *
     * If the $alt_as_norm false, the alternates will be shown as footbar.
     *
     * @param $alt The alternate text (default: "")
     * @param $alt_as_norm If true, the alternates will be shown in a more
     * traditional format
     * @return Array with processed text and the text for footbar
     */
    public function get_block_as_text($alt = null, $alt_as_norm = false) {
        if ($alt) {
            $this->_alternate = $alt;
        }

        if (!$this->_style[BTK_IS_BLOCK]) {
            return array('', null);
        }

        $this->_style_function(true);

        if ($this->_content) {
            $out = $this->_style[BTK_ALT_OPEN_SIGN]
                 . $this->_content
                 . $this->_style[BTK_ALT_CLOSE_SIGN];

            if ($this->_alternate) {
                if ($alt_as_norm) {
                    global $blocktypes;
                    return array(rtrim($out)
                               . ' '
                               . $blocktypes[BLK_ALT][BTK_ALT_OPEN_SIGN]
                               . $this->_alternate
                               . $blocktypes[BLK_ALT][BTK_ALT_CLOSE_SIGN],
                               null
                    );
                } else {
                    return array($out, $this->_alternate);
                }
            } else {
                return array($out, null);
            }
        } else {
            return array("", null);
        }
    }
} # End of Block class

/**
 * This class is only for style-seeking.
 * The variables of it contains every datas that needs for processing.
 */
class StyleReturn {

    /** Still possible options. */
    public $options;
    /** If true, the last read character will be set. */
    public $is_char_to_set;
    /** Result of seeking (true if match). */
    public $result;

    /**
     * @param $result Result of test (is it opening style?)
     * @param $icts Is char to set (if false and won't be)
     * @param $options Currently still possible option(s)
     */
    public function __construct($result, $icts = false, $options = null) {
        $this->result = $result;
        $this->is_char_to_set = $icts;
        $this->options = $options;
    }
}

/**
 * This class handles the whole text and process it as well (with the help of
 * processing and traverse functions).
 * This class also contains the generated Block instances.
 *
 * Probably you will never use it directly, rather by a magic (recommended way)
 * or a processing function.
 */
class Blocks {
    /**
     * Original y value
     */
    private $orig_y;

    /**
     * Array of Blocks
     */
    private $blocks;

    /**
     * Optional / additional name postfix for HTML output
     */
    private $nameprofix;

    /**
     * Reducated blocktypes-like array for the processing
     * Generated via get_dummy_types([<unwanted types>]) global function
     */
    private $dummy_types;

    /**
     * @param $namepostfix Additional name postfix
     * @param $orig_y Minimal counter value
     * @param $disable_types Block types to be ignored
     */
    public function __construct(
        $namepostfix = "",
        ...$disable_types
    ) {
        $this->clear($namepostfix, ...$disable_types);
    }

    /**
     * This function clears the whole block (in other words, sets defaults).
     * Some of its values can be "inherited" via parameters.
     *
     * @param $namepostfix (default: "")
     * @param disable_styles Styles to be disabled (see: get_dummy_types())
     */
    private function clear($namepostfix = "", ...$disable_types) {
        $this->orig_y = y(true);

        $this->blocks = array();
        $this->blocks[y()] = new Block(y());

        $this->dummy_types = get_dummy_types(...$disable_types);

        $this->nameprofix = $namepostfix;

        // the following things are tmp_* variables for block-developing

        $this->tmp_sign = '';
        $this->tmp_is_open_sign = true;
        $this->tmp_is_escaped = false;
        $this->tmp_possible_styles = array();
    }

    /**
     * Set a new name postfix.
     *
     * @param $nameprofix Nameprofix to be added
     */
    public function add_nameprofix($nameprofix) {
        $this->nameprofix = $nameprofix;
    }

    // Temporary variables -------------

    /** Current possible opening or closing style sign. */
    private $tmp_sign;
    /** It marks that we're looking for opening or closing style sign. */
    private $tmp_is_open_sign;
    /**
     * It's only for one thing: I don't want to write
     * $this->blocks[y()]->get_style(BTK_CLOSE_SIGN) all the time.
     */
    private $tmp_close_sign;
    /**
     * If true, next character will be escaped (simply added and won't look
     * for signs).
     */
    private $tmp_is_escaped;
    /** An array of possible styles (via read character). */
    private $tmp_possible_styles;
    /** Returns the length of $tmp_possible_styles. */
    private function tmp_ps_length() {
        return count($this->tmp_possible_styles);
    }

    // End of tmp vars -----------------

    /**
     * Define a new Block with found style or handle the rest datas.
     */
    private function _add_new_style($tmp_sign_options, $char) {
        // If it can be 1 style's oo and it exactly is the wanted one
        if ((count($tmp_sign_options) == 1)
            && (array_keys($tmp_sign_options)[0] === $char)) {
            // Set a new Block with style
            $this->blocks[y(true)] = new Block(y(),
                                    $tmp_sign_options[$char][DUM_NAME]);

            // Clear tmp_sign
            $this->tmp_sign = '';
            // Refresh close sign
            $this->tmp_is_open_sign = false;
            $this->tmp_close_sign = $tmp_sign_options[$char][DUM_CS];
        } // It or they isn't surely an opening style
        else {
            $this->blocks[y()]->getset_content($this->tmp_sign);
            $this->tmp_sign = $char;
            $this->tmp_is_open_sign = true;
            // Refresh the possible styles
            $this->tmp_possible_styles = $tmp_sign_options;
        }
    }

    /**
     * Adds a single char to the current process. It also detects and handles
     * the open and close signs.
     *
     * @param $char The character to be added
     */
    public function setchar($char) {

        // Check escaping things -------------

        if ($this->tmp_is_escaped) {
            $this->tmp_is_escaped = false;
            $this->blocks[y()]->getset_content($char);
            return;
        }

        if (($char === CHR_ESC)
            && $this->blocks[y()]->get_style_name() != BLK_ASIS) {
            $this->tmp_is_escaped = true;
            return;
        }

        // Normal processing -----------------

        // We're looking for an opening sign
        if ($this->tmp_is_open_sign) {
            // If there's a sign
            if ($this->tmp_sign) {
                $styleret = $this->_is_style($char);

                // Found a new sign
                if ($styleret->result) {
                    // Initialize a new Block
                    $this->blocks[y(true)] = new Block(
                        y(),
                        $styleret->options[DUM_NAME]);

                    // Copy the needed close sign
                    $this->tmp_close_sign =
                        $styleret->options[DUM_CS];

                    // Clear tmp-s
                    $this->tmp_is_open_sign = false;
                    if ($styleret->is_char_to_set) {
                        $this->blocks[y()]->getset_content($char);
                    }
                    $this->tmp_sign = '';
                } # End of "new block's finding"
                else {
                    // If there's one or more possible options
                    if ($styleret->options && !$styleret->is_char_to_set) {
                        // Store the read char
                        $this->tmp_sign .= $char;
                        // Refresh the possible styles
                        $this->tmp_possible_styles = $styleret->options;
                    } // There's no chance
                    else {
                        if ($tmp_sign_options = $this->_new_style($char)) {
                            $this->_add_new_style($tmp_sign_options, $char);
                        } else {
                            // Add currently read and stored chars
                            $this->blocks[y()]->getset_content(
                                $this->tmp_sign . $char);
                            // Clear stored chars
                            $this->tmp_sign = '';
                        }
                    }
                } # End of "new block's NOT finding"
            } // If there's no sign (i.e. there's no opening sign -- yet!)
            else {
                // $tmp_sign_options is an array, contains dummy block types
                // Look for new style
                if ($tmp_sign_options = $this->_new_style($char)) {
                    $this->_add_new_style($tmp_sign_options, $char);
                } // If it's definitely not a possible opening sign
                else {
                    // Just add a new char... booooring
                    $this->blocks[y()]->getset_content($char);
                }
            }
        } // If this isn't an opening sign (i.e. it's a closing sign)
        else {
            $styleret = $this->_is_close_sign($char,
                                             strlen($this->tmp_close_sign));

            if ($styleret->result) {
                $this->blocks[y(true)] = new Block(y());
                $this->tmp_sign = '';
                $this->tmp_is_open_sign = true;
                $this->tmp_close_sign = '';
                $this->tmp_possible_styles = array();
            } else {
                if ($styleret->is_char_to_set) {
                    $this->blocks[y()]->getset_content($this->tmp_sign .
                                                                     $char);
                    $this->tmp_sign = '';
                }
            }
        }

        # 4 tests
        /*echo "<span style='font-family: monospace'>$char&emsp;"
		    ."cls: " . $this->blocks[y()]->get_style(BTK_CLASS) . ",&emsp;"
		    ."tmps: '$this->tmp_sign',&emsp;"
			."tmpo: '". $this->tmp_is_open_sign . "',&emsp;"
			."tmpc: '$this->tmp_close_sign',&emsp;"
			."tmpe: " . $this->tmp_is_escaped . ",&emsp;"
			."tmppsl: " . $this->tmp_ps_length() . ",&emsp;"
			."y: " . y()
			."</span><br>\n";*/
    }

    /**
     * Returs an array of dummy block types if given char is a possible
     * open sign. Returns false elsewhere.
     *
     * @param $char Read character
     * @return An array or the boolean false
     */
    private function _new_style($char) {
        /** Variable of output */
        $out = array();

        // Check the dummy_types for possible styles
        foreach (array_keys($this->dummy_types) as $key) {
            // If it's a possible opening style, let's store it
            if ($key[0] === $char) {
                $out[$key] = $this->dummy_types[$key];
            }
        }

        // Return the array if there's a match, false otherwise
        if (count($out)) {
            return $out;
        } else {
            return false;
        }
    }

    /**
     * It's like the _new_style function, but it's for detect the rest of the
     * opening sign (while that's for detect a possible opening sign).
     *
     * @param $char string Read character
     * @return A StyleReturn instance
     */
    private function _is_style($char) {
        /** Variable of output */
        $out = array();
        /** Current tmp sign concatenated to $char. */
        $tmps = $this->tmp_sign . $char;

        // If tmp_possible_styles is not empty (it can't be theoretically)
        if ($ps_len = $this->tmp_ps_length()) {
            // If there's only one possible style
            if ($ps_len == 1) {
                // 1 possible style and this is it
                if (isset($this->tmp_possible_styles[$tmps])) {
                    return new StyleReturn(true, false,
                                           $this->tmp_possible_styles[$tmps]);
                } else {
                    // 1 possible style and this MAY WILL be it
                    if (substr(array_keys($this->tmp_possible_styles)[0],
                               0,
                               strlen($tmps)) == $tmps) {
                        return new StyleReturn(false, false,
                                                   $this->tmp_possible_styles);
                    } // 1 possible style and this is NOT it
                    else {
                        $this->tmp_possible_styles = array();
                        return new StyleReturn(false, true);
                    }
                }
            } // There's more than 1 possible style
            else {
                // More then 1 possible style and this is among them
                foreach (array_keys($this->tmp_possible_styles) as $key) {
                    // Temporarily stored substring
                    $tmp_subkey = substr($key, 0, strlen($tmps));
                    if (strlen($key) >= strlen($tmps)) {
                        # NOTE why are there 2 if's instead of 1?
                        if ($tmp_subkey === $tmps) {
                            // It may will the sign we need
                            $out[$key] = $this->tmp_possible_styles[$key];
                        }
                        // No else, it can't be
                    }
                } # End of possible styles' loop

                if (count($out) == 1) {
                    if (isset($out[$tmps])) {
                        return new StyleReturn(true, false, $out[$tmps]);
                    }
                } elseif (count($out) == 0) {
                    if (isset($this->tmp_possible_styles[$this->tmp_sign])) {
                        return new StyleReturn(true, true,
                                $this->tmp_possible_styles[$this->tmp_sign]);
                    }
                }
            }

            // If there's still some possible style
            if ($out) {
                return new StyleReturn(false, false, $out);
            } else {
                return new StyleReturn(false, true); // No chance
            }
        }

        // Return for the impossible case
        return new StyleReturn(false, true);
    }

    /**
     * It's like the _is_style function, but it's for detect the currently
     * needed closing sign.
     *
     * @param $char string Read character
     * @param $close_sign_length Length of current close sign
     * @param $close_sign The needed close sign. If null, the tmp_close_sign
     * will be the currently needed (default: null)
     * @return StyleReturn instance
     */
    private function _is_close_sign(
        $char,
        $close_sign_length,
        $close_sign = null
    ) {
        if (!$close_sign) {
            $close_sign = $this->tmp_close_sign;
        }

        // If there's a possible closing sign
        if ($this->tmp_sign) {
            $tmps = $this->tmp_sign . $char;

            // If the close sign's length bigger than current tmp_sign
            // and tmps can be the needed close sign
            if (($close_sign_length > strlen($tmps))
                && (substr($close_sign,
                    0,
                    strlen($tmps)) === $tmps)) {
                $this->tmp_sign = $tmps;
            } else {
                if ($close_sign === $tmps) {
                    return new StyleReturn(true);
                } else {
                    return new StyleReturn(false, true);
                }
            }
        } // If there's no possible closing signs yet
        else {
            if ($close_sign[0] === $char) {
                if ($close_sign_length > 1) {
                    $this->tmp_sign = $char;
                } else {
                    return new StyleReturn(true);
                }
            } else {
                return new StyleReturn(false, true);
            }
        }

        return new StyleReturn(false, false);
    }

    /**
     * It is the "standard" sorting and alternate-relocating function.
     */
    private function _standard_sorting() {
        /** New indexing for have no lacking indexes in the output */
        $y = $this->orig_y;

        if (!$this->blocks) {
            y_to_value($this->orig_y);
            return;
        }

        $maxidx = $this->orig_y+count($this->blocks);
        for ($i = $y; $i < $maxidx; $i++) {
            # 4 tests
            /*echo "y: $y,&emsp;i: $i,&emsp;id: "
			   . $this->blocks[$i]->get_id()
			   . ",&emsp;l: " . $this->blocks[$i]->get_content_length()
			   . '<br>';*/

            if ($this->blocks[$i]->get_style_name() === BLK_ALT) {
                $this->blocks[$y-1]->getset_alternate(
                                           $this->blocks[$i]->getset_content());
            } elseif (($this->blocks[$i]->get_content_length())
                     && ($this->blocks[$i]->getset_content() != ' ')) {
                $this->blocks[$i]->set_id($y);
                $this->blocks[$y++] = $this->blocks[$i];
            }
        }

        //echo $this->orig_y + count($this->blocks);
        // unset unwanted blocks
        for ($i = $y; $i < $maxidx; $i++) {
            unset($this->blocks[$i]);
        }
        //echo ' '.count($this->blocks);

        y_to_value($y-1);
    }

    /**
     * It is the "no alt" sorting that will ignore every alternate boxes.
     */
    private function _no_alt_sorting() {
        /** New indexing for have no lacking indexes in the output */
        $y = $this->orig_y;

        if (!$this->blocks) {
            y_to_value($this->orig_y);
            return;
        }

        $maxidx = $this->orig_y+count($this->blocks);
        for ($i = $y; $i < $maxidx; $i++) {
            if (($this->blocks[$i]->get_style_name() != BLK_ALT)
                && (   ($this->blocks[$i]->get_content_length())
                    && ($this->blocks[$i]->getset_content() != ' '))) {
                $this->blocks[$y++] = $this->blocks[$i];
            }
        }

        // unset unwanted blocks
        for ($i = $y; $i < $maxidx; $i++) {
            unset($this->blocks[$i]);
        }

        y_to_value($y-1);
    }

    /**
     * This function will close a current processing and clear the instance if
     * needed.
     *
     * @param $clearinstance Clear the instance (by Blocks' clear() function)
     * @param $flags Used flags (only FLG_SHOW_HIDDEN and FLG_IGNORE_ALT will
     * cause effect)
     */
    public function close($clearinstance = false, ...$flags) {
        // Without this line, the character(s) from $tmp_sign won't be added.
        $this->blocks[y()]->getset_content($this->tmp_sign);

        if (!$clearinstance) {
            if (!in_array(FLG_IGNORE_ALT, $flags)) {
                $this->_standard_sorting();
            } else {
                $this->_no_alt_sorting();
            }

            if (in_array(FLG_SHOW_HIDDEN, $flags)) {
                for ($i = $this->orig_y;
                     $i < $this->orig_y+count($this->blocks); $i++) {
                    $this->blocks[$i]->set_style_attribute(BTK_IS_BLOCK, true);
                }
            }
        } else {
            $this->clear();
        }
    }

    /**
     * @return Array of blocks
     */
    public function get_blocks() {
        return $this->blocks;
    }

    /**
     * It returns every blocks as a string in the "Ztext standard" HTML format.
     *
     * @param $alt_as_norm If true, alternates will be shown as normal texts
     * @return string of processed HTML text
     */
    public function get_blocks_as_HTML(
        $alt_as_norm = false,
        $ignore_alt = false
    ) {
        $out = '';
        foreach ($this->blocks as $b) {
            $out .= $b->get_block_as_HTML($this->nameprofix, '',
                                          $alt_as_norm, $ignore_alt);
        }
        return $out;
    }

    /**
     * It returns every blocks as a string with a footbar.
     *
     * @return string of processed hybrid HTML text
     */
    public function get_blocks_as_hybrid() {
        $out = '';
        $foot = array();
        foreach ($this->blocks as $b) {
            $this->hybrid_output_setting($out,
                                         $foot,
                  $b->get_block_as_hybrid($this->nameprofix, ''));
        }

        if ($foot) {
            $out .= "\n\n"
                  . str_repeat(SEP_FOOTBAR_CHAR, SEP_FOOTBAR_LENGTH)
                  . "\n\n";

            for ($i = 0; $i < count($foot); $i++) {
                $out .= '<a id="' . NAM_BOOKMARK_FOOTBAR
                        . $this->footbar_id($i + 1) . '"'
                        . ' href="#' . $this->footbar_id($i + 1)
                        . '" class="bm">'
                        . '<sup>[' . ($i+1) . ']</sup>'
                        . '</a>'
                        . ':&nbsp;' . rtrim($foot[$i], "\n") . "<br>";
            }


            return rtrim($out);
        } else {
            return $out;
        }
    }

    /**
     * It returns every blocks as plain text.
     *
     * @param $alt_as_norm If true, alternates will be shown as normal texts
     * @return string of processed plain text (sounds like a paradox, isn't it?)
     */
    public function get_blocks_as_text($alt_as_norm = false) {
        $out = '';
        $foot = array();
        foreach ($this->blocks as $b) {
            $this->hybrid_output_setting($out,
                                         $foot,
                                         $b->get_block_as_text(null,
                                                               $alt_as_norm),
                                         true);
        }

        if ($foot && !$alt_as_norm) {
            $out .= "\n\n"
                  . str_repeat(SEP_FOOTBAR_CHAR_FOR_TEXT, SEP_FOOTBAR_LENGTH)
                  . "\n\n";

            for ($i = 0; $i < count($foot); $i++) {
                $out .= '[' . ($i+1) . ']: ' . $foot[$i] . "\n";
            }


            return rtrim($out);
        } else {
            return $out;
        }
    }

    /**
     * I don't really know how I could describe this function.
     *
     * @param $out Output of function
     * @param $foot A single piece of future footer
     * @param $contents Output of get_block_as_hybrid() or get_block_as_text()
     * @param $txt True if it's for plain text output (default: false)
     */
    private function hybrid_output_setting(
        &$out,
        &$foot,
        $contents,
        $txt = false
    ) {
        // If alternate is set
        if ($contents[1]) {
            // Add it to $foot
            array_push($foot, $contents[1]);
            // Original length of content
            $L = strlen($contents[0]);
            // Trim the spaces from the content's end
            $cont = rtrim($contents[0], ' ');
            // Length of $foot
            $footlength = count($foot);
            // If not plain text (i.e. HTML) output
            if (!$txt) {
                $out .= $cont
                      . '<a id="' . $this->footbar_id($footlength) . '"'
                        . ' href="#' . NAM_BOOKMARK_FOOTBAR
                        . $this->footbar_id($footlength)
                      . '" class="bm">'
                      . '<sup>' . $footlength . '</sup>'
                      . '</a>'
                      . str_repeat(' ', $L - strlen($cont));
            } // If plain text output
            else {
                $out .= $cont
                      . '[' . count($foot) . ']'
                      . str_repeat(' ', $L - strlen($cont));
            }
        } else {
            $out .= $contents[0];
        }
    }

    /**
     * Returns a footbar id without the postfix(es) for bookmarking.
     *
     * The easiest function of this whole program.
     */
    private function footbar_id($num) {
        return NAM_BOOKMARK . "-$num";
    }
} # End of Blocks class

/*
 * End of Classes --------------------------------------------------------------
 *                              No class' land
 * Processes and y() -----------------------------------------------------------
 */

/**
* It increments and returns the $global_y.
*
* @param $inc If true, it'll PREincrement the $global_y (default: false)
* @return The $global_y
*/
function y($inc = false) {
    global $global_y;
    return $inc ? ++$global_y : $global_y;
}

/**
 * It sets the $global_y's value and also may increment that.
 *
 * @param $value New value
 * @param $inc If true, it'll increment the $global_y's new value (def.: false)
 */
function y_to_value($value, $inc = false) {
    global $global_y;
    $global_y = $value;
    if ($inc) {
        $global_y++;
    }
}

/**
 * This is a dummy type of processing functions, mainly for tests.
 *
 * It's a kinda dummy function originally for test the processings and
 * later some features of magic functions (like file-reading, different
 * output types, etc).
 *
 * @param $text Text to be processed
 * @param $outmode Type of output (use constants with PRO_OUT prefixes)
 * @param $disable_types Block types to be disabled
 */
function testprocess($text, $outmode, ...$disable_types) {
    $b = new Blocks("", ...$disable_types);
    $i = 0;
    //print($text);

    $text2 = preprocess($text);

    while ($i < strlen($text2)) {
        $b->setchar($text2[$i]);
        $i++;
    }

    $b->close();

    $text2 = frame(finprocess($b->get_blocks_as_HTML()));
    $b->add_nameprofix('hybrid');
    $text2 .= frame(finprocess($b->get_blocks_as_hybrid()), false, 'hybrid');
    $text2 .= frame(replace_by_array($b->get_blocks_as_text(),
                                     PRO_REPLACE_TEXT), true);

    if ($outmode !== PRO_OUT_BLOCKS_INSTANCE) {
        unset($b);
    }

    // Final step
    switch ($outmode) {
        case PRO_OUT_STRING:
            return $text2;
        case PRO_OUT_BLOCKS_INSTANCE:
            return $b;
        case PRO_OUT_PRINT:
             echo $text2;
            break;
        default:
            print("\n\nThere wasn't given a valid output mode, so " .
                  "now you be seeing this. Don't worry, just smile :)\n");
            break;
    }
    echo "[ORIG] " . htmlspecialchars($text) . ' [ENDOFORIG]<br>';
}

/**
 * It makes a full text process.
 *
 * Using it directly is not recommended, you should use a magic function.
 */
function fullprocess(
    $text,
    $is_hybrid = false,
    $nameprofix = '',
    $showhidden = false,
    $ignore_alt = false,
    $alt_as_norm = false,
    ...$disable_types
) {
    return finprocess(process(preprocess($text),
                              $is_hybrid,
                              $nameprofix,
                              $showhidden,
                              $ignore_alt,
                              $alt_as_norm,
                              ...$disable_types)
    );
}

/**
 * Preprocessing function for HTML outputs.
 *
 * @param $text Text to be processed
 */
function preprocess($text) {
    return replace_by_array(trim($text), PRO_REPLACE_PRE);
}

/**
 * The (middle) processing function for HTML output.
 */
function process(
    $text,
    $is_hybrid,
    $nameprofix,
    $showhidden,
    $ignore_alt,
    $alt_as_norm,
    ...$disable_types
) {
    $b = new Blocks('', ...$disable_types);

    //foreach ($text as $char)
    //	$b->setchar($char);

    traverse($b, $text);

    if ($nameprofix) {
        $b->add_nameprofix($nameprofix);
    }

    if ($showhidden) {
        $b->close(false, FLG_SHOW_HIDDEN);
    } else {
        $b->close();
    }

    if ($is_hybrid) {
        return $b->get_blocks_as_hybrid();
    } else {
        return $b->get_blocks_as_HTML($alt_as_norm, $ignore_alt);
    }
}

/**
 * Alternate version of processing for HTML output, used within block's own
 * inner functions.
 */
function altprocess(
    $text,
    $is_hybrid,
    $nameprofix,
    $showhidden,
    $ignore_alt,
    $alt_as_norm,
    ...$enable_types
) {
    global $blocktypes;

    $disable_types = array();
    foreach (array_keys($blocktypes) as $key) {
        if (!in_array($key, $enable_types)) {
            array_push($disable_types, $key);
        }
    }

    return process($text, $is_hybrid, $nameprofix, $showhidden,
                   $ignore_alt, $alt_as_norm, ...$disable_types);
}

/**
 * Final steps of HTML output.
 */
function finprocess($text) {
    return replace_by_array($text, PRO_REPLACE_FIN);
}

/**
 * It's like the fullprocess function, but it's for plain text output.
 */
function textprocess(
    $text,
    $showhidden = false,
    $ignore_alt = false,
    $alt_as_norm = false,
    ...$disable_types
) {
    return replace_by_array(midtextprocess(preprocess($text),
                                           $showhidden,
                                           $ignore_alt,
                                           $alt_as_norm,
                                           ...$disable_types),
                            PRO_REPLACE_TEXT
    );
}

/**
 * It's like the process function for HTML output.
 */
function midtextprocess(
    $text,
    $showhidden,
    $ignore_alt,
    $alt_as_norm,
    ...$disable_types
) {
    $b = new Blocks('', ...$disable_types);

    traverse($b, $text);

    if ($showhidden && $ignore_alt) {
        $b->close(false, FLG_SHOW_HIDDEN, FLG_IGNORE_ALT);
    } elseif ($showhidden) {
        $b->close(false, FLG_SHOW_HIDDEN);
    } elseif ($ignore_alt) {
        $b->close(false, FLG_IGNORE_ALT);
    } else {
        $b->close();
    }

    return $b->get_blocks_as_text($alt_as_norm);
}

/**
 * Final steps for plain text output.
 */
function fintextprocess($text) {
    return replace_by_array($text, PRO_REPLACE_TEXT);
}

/**
 * Traverse a text and set its characters.
 *
 * @param $blockinstance The currently used Blocks instance
 * @param $text The text to be processed
 */
function traverse(&$blockinstance, $text) {
    $i = 0;
    while ($i < strlen($text)) {
        $blockinstance->setchar($text[$i]);
        $i++;
    }
}

/*
 * End of Processes and y() ----------------------------------------------------
 *           I don't really know what's going on, so it's MY land!
 * Other Functions -------------------------------------------------------------
 */

/**
 * Returns a file's location.
 *
 * Outdated, available only for backward compatibility.
 *
 * @param $fname Filename
 * @param $fdir Directory
 * @param $fext File's extension (default: txt -- nowadays 'zxto' is the
 * preferred extension!)
 * @return string A single file's location
 */
function gets_to_location($fname, $fdir, $fext = '.txt') {
    return "$fdir/$fname$fext";
}

/**
 * Read a plain text file and returns its text.
 *
 * Outdated, available only for backward compatibility.
 *
 * @param $fname Filename
 * @param $fdir Directory
 * @param $fext File's extension
 * @return string File's content
 */
function readafile($fname, $fdir, $fext = '.txt.') {
    $fpath = gets_to_location($fname, $fdir, $fext);
    ;
    $file = fopen($fpath, 'r') or die("Invalid filename or location.");
    $tmp = fread($file, filesize($fpath));
    fclose($file);

    return $tmp;
}

/**
 * Add header to output.
 *
 * @param $header Header's text
 * @param $type Header's type. Options: 'H', 'I', 'J', 'K', use FLG_HEAD_* flag!
 * @param $frame The header will be between section tags (default: true)
 * @param $add_class Additional class (default: '')
 * @param $hidden_char Character that signs hidden files (default: '~')
 * @return string A HTML header within a section
 */
function add_header(
    $header,
    $type,
    $add_class = '',
    $frame = true,
    $hidden_char = "~"
) {
    switch ($type) {
        case FLG_HEAD_1ST:
            $h = 'h1';
            break;
        case FLG_HEAD_2ND:
            $h = 'h2';
            break;
        case FLG_HEAD_3RD:
            $h = 'h3';
            break;
        case FLG_HEAD_4TH:
            $h = 'h4';
            break;
        default:
            return '';
    }

    $header = str_replace($hidden_char, '', $header);

    if ($frame) {
        return "<section class='$add_class title'><$h>"
             . $header
             . "</$h></section>";
    } else {
        return $header;
    }
}

/**
 * It adds the "standard" frame to the processed text (i.e. an article tag with
 * class(es)).
 *
 * @param $text The processed text
 * @param $txt Text (bool true) or normal (bool false) output (default: false).
 * @param $ownclass Own class(es) to the output (default: "")
 * @param $buttons Add buttons (default: "")
 * @param $but_out Add buttons outside the frame
 * @return Processed text between the frame tags.
 */
function frame($text, $txt = false, $ownclass = '',
               $buttons = '', $but_out = false) {
    return (($buttons && !$but_out) ? $buttons : '')
         . '<article class="ztext'
         . ($txt ? ' text' : '')
         . ($ownclass ? " $ownclass" : '')
         . '">'
         . (($buttons && $but_out) ? $buttons : '')
         . $text
         . '</article>';
}

/**
 * It generates a dummy blocktype array with the following constructtion:
 * <oc> => array( DUM_NAME => <blockname>, DUM_CLOSE_SIGN => <oc> )
 *
 * @param $disable Blocktypes to be disabled
 * @return Array of dummy types
 */
function get_dummy_types(...$disable) {
    array_push($disable, BLK_NORMAL);

    global $blocktypes;
    $out = array();

    # it ought to be nicer
    if ($disable) {
        foreach ($blocktypes as $key => $value) {
            if (!in_array($key, $disable)) {
                $out[$value[BTK_OPEN_SIGN]] =
                    array(DUM_NAME => $key,
                          DUM_CS => $value[BTK_CLOSE_SIGN]);
            }
        }
    } else {
        foreach ($blocktypes as $key => $value) {
            $out[$value[BTK_OPEN_SIGN]] =
                array(DUM_NAME => $key,
                      DUM_CS => $value[BTK_CLOSE_SIGN]);
        }
    }

    return $out;
}

/**
 * Get and return a text what modified by an assoc array with string pairs.
 *
 * @param $text Original text
 * @param $rarr Assoc array with orig=>new string values
 * @return text after the replaces
 */
function replace_by_array($text, $rarr) {

    foreach ($rarr as $orig => $new) {
        $text = str_replace($orig, $new, $text);
    }
    return $text;
}

// Function for late processing within functions

/**
 * Processing function for normal block's inner functions.
 */
function process_within_normal($text, $plain) {
    $tmp_open = true;
    $tmp_stored = '';
    $tmp = '';

    for ($i = 0; $i < strlen($text); $i++) {
        if ($tmp_open) {
            if ($text[$i] == '>') {
                $tmp_open = false;
                $tmp .= '>';
            } else {
                $tmp .= $text[$i];
            }
        } else {
            if ($text[$i] != '<') {
                $tmp_stored .= $text[$i];
            } else {
                $tmp_open = true;
                if (!$plain) {
                    $tmp .= process($tmp_stored, false, 'normal',
                                          false, true, false) . '<';
                } else {
                    $tmp .= textprocess($tmp_stored, false,
                                        true, false) . '<';
                }
                $tmp_stored = '';
            }
        }
    }

    return $tmp . $tmp_stored;
}

/**
 * Dummy processing function for italy blocks (detect and handle only normal
 * blocks).
 */
function normal_within_italy($text) {
    // FIXME: the commented version should work
    // return altprocess($text, false, 'it-sub', false, false, BLK_NORMAL);
    $i = 0;
    $j = true;
    $out = '';
    global $blocktypes;

    while ($i < strlen($text)) {
        if ($text[$i] == '|') {
            if ($j) {
                $out .= '<span id="' . y(true) . '-'
                      . $blocktypes[BLK_NORMAL][BTK_CLASS]
                      . '-italy" class="normal">';
            } else {
                $out .= '</span>';
            }
            $j = !$j;
        } else {
            $out .= $text[$i];
        }
        $i++;
    }

    return $out;
}

/*
 * End of Ztext ----------------------------------------------------------------
 *                      This isn't my land, this is my Kingdom!
 * Using via POST --------------------------------------------------------------
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	echo nu_magic($_POST['text'], $_POST['head'], 'editor', ...$_POST['flags']);
}
