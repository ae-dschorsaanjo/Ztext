# Blocks
The blocks define the different _formattings_ and its _special functions_.
Basically every _block name_ and _block argument keys_ has its own id, and every id has a constant. For block names, use constants with the _BLK_ prefix and for _keys_ use constants with the _BTK_ prefix.



These bold shortings are used within the code and this document.

## Argument keys
These keys are used within the _block definitions_ (__$blocktypes__ global variable). Technically _$blocktypes_ is an associative array, contains associative arrays. The _block's keys_ will be defined below, while the _argument keys_ are defined here.

Every block has:
- open sign (__oo__) -- _[string]_ the used open sign within Ztext,
- close sign (__oc__) -- _[string]_ the used close sign within Ztext,
- alternate open sign (__ao__) -- _[string]_ the alternate open sign, used in _text output_,
- alternate close sign (__ac__) -- _[string]_ the alternate close sign, used in _text output_,
- class (__cl__) -- _[string]_ the _HTML class_ for blocks,
- name suffix (__pf__) -- _[string]_ the name suffix of _HTML ids_,
- and a block visibility attribute (__ib__) -- _[boolean]_ the default visibility of a block.

Optionally they also have an inner function (__if__) for other inner formattings. It is an anonymous function.

## Block types
The names of the blocks are as they are in the code.
Their arguments are marked with those's short forms as they are in the code. If an argument has no value, then it is either an empty string (if signs) or undefined (if inner functions).

__In the moment there are no definitions here.
I will add them sooner or later (hopefully sooner).__
Until that you can find the basic informations about blocks in the (README.md)

### BLK_ITALY
Italic text.

- __oo__: `"`
- __oc__: `"`
- __ao__: `"`
- __ac__: `"`
- __cl__: italy
- __pf__: i
- __ib__: `true`
- __if__: detects _normal_ texts within this block and disallow the italic formatting

### BLK_NORMAL
Normal text, unsigned, it is the default case.

__oo__:
__oc__:
__ao__:
__ac__:
__cl__: normal
__pf__: n
__ib__: `true`
__if__:

### BLK_NORMAL2
Signed normal text, in which you can use HTML tags too.

- __oo__: `|`
- __oc__: `|`
- __ao__:
- __ac__:
- __cl__: normal
- __pf__: n
- __ib__: `true`
- __if__: makes a full inner processing, but keeps the HTML tags unchanged

### BLK_BOLD
Bold text.

- __oo__: `~`
- __oc__: `~`
- __ao__: `*`
- __ac__: `*`
- __cl__: bold
- __pf__: b
- __ib__: `true`
- __if__:

### BLK_LINETHROUGH
Strikethrough/linethrough text.

- __oo__: `---`
- __oc__: `---`
- __ao__: `[DELETED:`
- __ac__: `]`
- __cl__: linethrough
- __pf__: lt
- __ib__: `true`
- __if__:

### BLK_TITLE
Makes a 1st level title (that is _not_ a HTML h1 header).

- __oo__: `__`
- __oc__: `__`
- __ao__: `__`
- __ac__: `__`
- __cl__: title
- __pf__: h
- __ib__: `true`
- __if__:

### BLK_SUBTITLE
Makes a 2nd level title (that is _not_ a HTML h2 header).

- __oo__: `___`
- __oc__: `___`
- __ao__: `___`
- __ac__: `___`
- __cl__: subtitle
- __pf__: hh
- __ib__: `true`
- __if__:

### BLK_SUBSUBTITLE
Makes a 3rd level title (that is _not_ a HTML h3 header).

- __oo__: `____`
- __oc__: `____`
- __ao__: `____`
- __ac__: `____`
- __cl__: subsubtitle
- __pf__: hhh
- __ib__: `true`
- __if__:

### BLK_COMMENT
Makes a green comment block.

- __oo__: `(++`
- __oc__: `++)`
- __ao__: `/*`
- __ac__: `*/`
- __cl__: comm
- __pf__: c
- __ib__: `true`
- __if__: full text process, but avoids nested comment blocks

### BLK_ALINECOMM
One line comment

- __oo__: `!++`
- __oc__: `\n` (end of line)
- __ao__: `//`
- __ac__: `\n`
- __cl__: alinecomm
- __pf__: lc
- __ib__: `true`
- __if__: look for _alternate block_ within the block and handles it as alternate text (it is necessary, because without it, the alternate block would be a part of the alinecomm block)

### BLK_CODE
Code block that uses monospace font and within you can use the escape character.

- __oo__: ` `` `
- __oc__: ` `` `
- __ao__: `\n[CODE]\n`
- __ac__: `\n[ENDOFCODE\n`
- __cl__: code
- __pf__: cd
- __ib__: `true`
- __if__: renders special characters as html characters and avoids the alternate block after it

### BLK_QUOTE
Quote block.

- __oo__: `)(`
- __oc__: `"`
- __ao__: `\n"""\n`
- __ac__: `\n"""\n`
- __cl__: quote
- __pf__: q
- __ib__: `true`
- __if__: adds the content of the alternate block after it as writer

### BLK_WARNING
Makes a centered red error/warning message.

- __oo__: `.!.`
- __oc__: `.!.`
- __ao__: `!!! `
- __ac__: ` !!!`
- __cl__: warning
- __pf__: w
- __ib__: `true`
- __if__: adds the content of the alternate block after it as explanation

### BLK_COLLAPSEABLE
Expandable block.

- __oo__: `?.`
- __oc__: `.?`
- __ao__: `[[`
- __ac__: `]]`
- __cl__: coll
- __pf__: cl
- __ib__: `true`
- __if__: if it contains the separate token (CHR_SEP, /// by default), left to it will be the text you see and right to it will be the collapsed text (in text or hybrid modes, the collapsed text will be shown as an _alternate block_)

### BLK_ALTERNATE or BLK_ALT
These are used for _clickable blocks_ and other, secondary contents.

- __oo__: `[`
- __oc__: `]`
- __ao__: `[`
- __ac__: `]`
- __cl__: alt
- __pf__: a
- __ib__: `true`
- __if__:

### BLK_LINK
Makes a link.

- __oo__: `((`
- __oc__: `))`
- __ao__: `(`
- __ac__: `)`
- __cl__: link
- __pf__: l
- __ib__: `true`
- __if__: It creates a link where the content will be the visible text and the alternate be the location.

### BLK_HIDDEN
It is a hidden text, that is not in the output by default, used for private comments.

- __oo__: `{`
- __oc__: `}`
- __ao__: `{`
- __ac__: `}`
- __cl__: hidden
- __pf__: h
- __ib__: `false`
- __if__:

### BLK_ASIS
Everything will be shown as is -- no escape characters or inner block processing. Unlike the code block, this results _inline content_.

- __oo__: `\=`
- __oc__: `=\`
- __ao__: `\`
- __ac__: `\`
- __cl__: asis
- __pf__: ai
- __ib__: `true`
- __if__: renders special characters as html characters