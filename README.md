# Ztext original
It is a simple markup language, intended for general use. It needs PHP7 and uses Javascript for _clickable blocks_ (but it also can work without Javascript perfectly). Tested in Chromium, Firefox, Konqueror, Lynx and Links2.

# How does it work?
All you need is the __ztext.php__, __ztext.css__ and __ztext.js__.

It generates HTML or plain text output from a text file (usually a zxto file). During the processing it will split the text into _blocks_.

To get the needed output you can use the __magic functions__ or the __processing functions__. The _processing functions_ gives you relatively raw access to the processing, while the _magic functions_ gives you an easy way to use the processing functions (I recommend this way).

The most practical way though probably to use the __nu_magic__ function. It is configurable easily by _flags_ of how and into what format should process the input, and also can add a proper header (h1 to h4). The output will be within an _article.ztext_.

The __blocks__ are signed (except _Normal2_, see below). If you want to write something that would be handled as a sign, you are able to use the __escape character__ (^)before it and write it.

# Flags
The _flags_ are telling the _nu_magic_ how to process a text, for example *FLG_PRO_FULL* will be a full processing, and *FLG_MOD_HYBRID* will generate a _hybrid HTML output_ (when the clickable blocks will be kind of footnotes).
Technically these are constants with _FLG_ prefix.

# Blocks
By functioning there are two types of blocks; the _clickable_ blocks and _usual_ blocks.

List of blocks (with its flag as id):
- Italic (__BLK_ITALY__): simple italic text
- Normal (__BLK_NORMAL__): simple text, this is the default and unsigned
- Normal2 (__BLK_NORMAL2__): like Normal text, but it is signed, and has an inner function that is able to handle inner HTML text
- Bold (__BLK_BOLD__): bold text
- Linethrough (__BLK_LINETHROUGH__): linethrough text
- Title (__BLK_TITLE__): first level title (NOT the same as HTML's _h1_)
- Subtitle (__BLK_SUBTITLE__): second level title (NOT the same as HTML's _h2_)
- Subsubtitle (__BLK_SUBSUBTITLE__): third level title (NOT the same as HTML's _h3_)
- Comment (__BLK_COMMENT__): comment block
- Comment line (__BLK_ALINECOMM__): one liner comment
- Code (__BLK_CODE__): code block for program code
- Quote (__BLK_QUOTE__): quote block for longer quotes
- Collapseable block (__BLK_COLLAPSEABLE__): these are collapsed by default, uncollapse by click
- Alternate (__BLK_ALTERNATE__ or __BLK_ALT__): these are invisible blocks, used mostly for create clickable blocks
- Link (__BLK_LINK__): links
- Hidden (__BLK_HIDDEN__): hidden blocks that are completely omited from output (by default), used for private comments
- As is (__BLK_ASIS__): everything within this block will be shown as is, even the _escape character_ (that is also usable within a code block)

## Clickable blocks
The reasons of Ztext's existence are these. By click to a clickable block, its text will become hidden and show its _alternate text_ instead. Potentially more than half of the blocks can be clickable by putting an alternate block after them.

Usually these are generated via _alternate blocks_, except the _clickable block_.

You can read more about the blocks within the [blocks.md](blocks.md).

# Versioning
For versioning I will use the following patterns:
- __Major version__ when something breaks _the block's_ backward-compatibility
- __Minor version__ when the use of _magic functions_, _processing functions_ changes (i.e. parameters) or something _changes backward-compatibility_ (e.g. array of replaces)
- __Patch version__ when everything stays backward-compatible

# Known issues
- With _hybrid mode_ you should use only one Ztext per site (otherwise you can use any number of Ztext)
- _blocks.md_ is not fully written

# License
This project's licensed under GNU General Public License version 3. You can find more information in the [LICENSE file](LICENSE).
