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

__In the moment there are no definitions here.
I will add them sooner or later (hopefully sooner).__
Until that you can find the basic informations about blocks in the (README.md)