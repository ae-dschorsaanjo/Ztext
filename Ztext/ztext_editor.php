<?php
    // Before you're using it: make sure the Ztext is included in the php
    // that you call this program within!
?>
<style>
    :root {
        --def-width: 1000px;
    }

    h1 {
        text-align: center;
    }

    table.ztext-editor {

        margin: 0 auto;
        text-align: left;
        width: var(--def-width);
    }

    textarea#ztext-area {

        height: 190px;
        margin-top: 0.5em;
        margin-bottom: 0.5em;
        width: var(--def-width);
    }

    div#outp {

        margin-top: 1em;
        margin-bottom: 1em;
        border: 2px inset #DCDCDC;
        border-radius: 7px 7px;
        background-color: #f9f9f8;
        overflow: auto;
        padding: 0.5em;
        min-height: 180px;
        width: var(--def-width);
    }

    div.center {

        text-align: center;
    }

    div.left {

        text-align: left;
        width: 500px;
        margin: 0 auto;
    }

    table.ztext-editor td.flags {

        -webkit-column-count: 3;
           -moz-column-count: 3;
                column-count: 3;
    }

    table.ztext-editor td.flags>div {

        display: inline-block;
        width: 300px;
        margin-bottom: 1em;
        font-family: monospace;
    }

    table.ztext-editor td.flags>div div {

        font-size: 110%;
        font-family: sans-serif;
        margin-bottom: 0.33em;
    }
</style>
<script>
    $(function () {

        var flag_tags = $("td.flags input[type=checkbox]");
        var need_refresh = false;

        $("#ztext-area").keyup(function (e) {

            if ((e.which == 32) ||
                (e.which == 13) ||
                (e.which == 8)) {
                post_to_ztext();
            }
            else if (!need_refresh) {
                setTimeout(post_to_ztext, 1234);
            }
        });

        flag_tags.click(function (e) {
            post_to_ztext();
        });

        function post_to_ztext() {
            $.post('Ztext/ztext.php',
                    {
                        text: $('#ztext-area').val(),
                        head: 'Output',
                        flags: get_flags()
                    },
                    function (data, status) {
                        $('#outp').html(data);
                    }
            );
        }

        function get_flags() {
            var flags = [];
            var result = flag_tags.map(function() {
                    if ($(this).prop("checked"))
                        flags.push($(this).val());
            }).get();
            return flags;
        }

        $("#ztext-area").focus();
    });
</script>
<h1>Ztext editor</h1>
<table class='ztext-editor'>
<tr><td></td></tr>
    <div class='center'>It is a rather simple way to try out how Ztext works<br>
    (it doesn't meant to be nice or really useful, but to be good for testing).
    <br>
    <br>
    Currently known issues (of the editor):
        <div class='left'>
            - JavaScript doesn't work (i.e. "clickable" text aren't clickable)
        </div>
    </div>
<tr><td>
    <textarea id='ztext-area'></textarea>
</td></tr>

<tr><td class='flags'>

<div class='process'>
<div class='subtitle'>HTML output processing options</div>
<label title='Complete HTML process
(includes Preprocess, Midprocess and Finprocess).'>
<input type='checkbox' name='ztextflag-P' value='P' checked />
FLG_PRO_FULL</label><br>

<label title='Preprocessing for HTML output.'>
<input type='checkbox' name='ztextflag-E' value='E' />
FLG_PRO_PRE</label><br>

<label title='Midprocessing for HTML output
(i.e. in fact the processing w/o text preparation and correction).'>
<input type='checkbox' name='ztextflag-M' value='M' />
FLG_PRO_MID</label><br>

<label title='Final processing for HTML output (i.e. some corrections).'>
<input type='checkbox' name='ztextflag-N' value='N' />
FLG_PRO_FIN</label><br>
</div>

<div class='textprocess'>
<div class='subtitle'>Plain text output processing options</div>
<label title='Complete text process
(includes Midtextprocess and Fintextprocess).'>
<input type='checkbox' name='ztextflag-T' value='T' />
FLG_PRO_TEXT</label><br>

<label title='Midtextprocess'>
<input type='checkbox' name='ztextflag-S' value='S' />
FLG_PRO_MIDTEXT</label><br>

<label title='Fintextprocess'>
<input type='checkbox' name='ztextflag-X' value='X' />
FLG_PRO_FINTEXT</label><br>
</div>

<div class='HTML-format'>
<div class='subtitle'>HTML output formatting options</div>
<label title='Disallow default frame tags (an article.ztext will be given).'>
<input type='checkbox' name='ztextflag-F' value='F' />
FLG_FRAME_OFF</label><br>
</div>

<!--<div class='buttons'>
<div class='subtitle'>Button options (currently doesn't have any effect)</div>
<label title='Allow every button.'>
<input type='checkbox' name='ztextflag-B' value='B' />
FLG_BUT_ALL</label><br>

<label title='Allow download buttons.'>
<input type='checkbox' name='ztextflag-D' value='D' />
FLG_BUT_DL</label><br>

<label title='Allow control buttons.'>
<input type='checkbox' name='ztextflag-C' value='C' />
FLG_BUT_CTRL</label><br>
</div>-->

<div class='headers'>
<div class='subtitle'>Header options for HTML output</div>
<label title='Adds 1st level header (h1)'>
<input type='checkbox' name='ztextflag-H' value='H' />
FLG_HEAD_1ST</label><br>

<label title='Adds 2nd level header (h2)'>
<input type='checkbox' name='ztextflag-I' value='I' />
FLG_HEAD_2ND</label><br>

<label title='Adds 3rd level header (h3)'>
<input type='checkbox' name='ztextflag-J' value='J' />
FLG_HEAD_3RD</label><br>

<label title='Adds 4th level header (h4)'>
<input type='checkbox' name='ztextflag-K' value='K' />
FLG_HEAD_4TH</label><br>
</div>

<div class='every-other'>
<div class='subtitle'>Other options</div>
<label title='Will not remove hidden blocks.'>
<input type='checkbox' name='ztextflag-R' value='R' />
FLG_SHOW_HIDDEN</label><br>

<label title='Disallow JavaScript scripts for Ztext
(if you do not want to lose any data from output, use the hybrid mode
instead of this).'>
<input type='checkbox' name='ztextflag-O' value='O' />
FLG_JS_OFF</label><br>

<label title='It will make Ztext to ignore every alternate blocks
(i.e. they will be handled as hidden blocks).'>
<input type='checkbox' name='ztextflag-A' value='A' />
FLG_IGNORE_ALT</label><br>

<label title='Show alternate blocks as normal text.'>
<input type='checkbox' name='ztextflag-L' value='L' />
FLG_ALT_AS_NORMAL</label><br>

<label title='Hybrid mode. Does not use JavaScript, but will not be
any data losen.'>
<input type='checkbox' name='ztextflag-0' value='0' />
FLG_MODE_HYBRID</label><br>
</div>
</td></tr>
<tr><td>
    <div id='outp'></div>
</td></tr>
<tr><td>
    <div id='help'>
    <?php
        /**
         * Just an unused function that I've been working on too long
         * to just delete it.
         */
        function print_r_tree($data) {
			// capture the output of print_r
			$out = print_r($data, true);

            $out = preg_replace_callback(
            '/([ \t]*)(\[[^\]]+\][ \t]*\=\>[ \t]*[a-z0-9 \t_]+)\n[ \t]*\(/iU',
                function ($m) {
                    $id =  substr(md5(rand().$m[0]), 0, 7);
                    return $m[1]
                         . "<a href=\"javascript:toggleDisplay('$id');\">"
                         . $m[2] . "</a>"
                         . "<div id=\"$id\" style=\"display: none;\">'";
                },
                $out
            );

			// replace ')' on its own on a new line
            // (surrounded by whitespace is ok) with '</div>
			$out = preg_replace('/^\s*\)\s*$/m', '</div>', $out);

			// print the javascript function toggleDisplay() and then
            // the transformed output
			return $out
                 . "<script>\n"
                 . "function toggleDisplay(id) {\n"
                 . "\tdocument.getElementById(id).style.display = "
                 . "(document.getElementById(id).style.display == \"block\") ? "
                 . "\"none\" : \"block\";\n}"
                 . "</script>";
		}

        //global $blocktypes;
		//echo '<pre>$blocktypes: '.print_r_tree($blocktypes)."</pre>";
    ?>
    </div>
</td></tr>
</table>
