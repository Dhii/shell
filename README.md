# Shell
![build status](https://travis-ci.org/Dhii/shell.svg?branch=master)

An Object Oriented shell wrapper implementation compliant with
[shell-interop](https://github.com/dhii/shell-interop) and [shell-command-interop](https://github.com/Dhii/shell-command-interop).

**Note**: *These are not PSR standards. However, with your support and feedback, they may one day get accepted!*

This implementation is inspired by [php-shell-wrapper](https://github.com/Dhii/php-shell-wrapper),
which is an excellent library on its own. However, I felt that there are 2 very important things missing:

* Standards. Using this library ties the developer to the particular implementation.
To code against it, the project would need to depend on it.
* Flexibility. The php-shell-wrapper library provides various "runners", which
are ways to run a command using different PHP functions. However, none of them
is comprehensive enough to get the standard output, error output, and exit code;
and none of them is flexible enough to allow doing exactly what is needed and only that.

## Advantages:
The only wrapper you'll ever need

* **Standards-compliant**: Implementation of all required and optional features of related standards;
* **Comprehensive**: Use all the possibilities exposed by PHP's native functions, but through an easy API;
* **Flexible**: Do what you need. No questions asked.

## Features
* *Exit code*: Acquire the exit code of the process;
* *Output*: Get any output produced by the process: stdout, stderr, or other;
* *Stream*: Stream process output without depleting the memory available to PHP;
* *Re-use*: The stateless shell allows execution of unlimited commands;
* *Structure*: Build commands and acquire results in a structured way with separate instances of dedicated classes.
* *Switch*: Don't like this implementation? Use another standards-compliant one, or create your own!

**Note**: *Italics above indicate a planned feature. Implemented features are in* **bold**.
