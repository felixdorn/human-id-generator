# Human ID Generator

[![Tests](https://github.com/felixdorn/human-id-generator/actions/workflows/tests.yml/badge.svg?branch=main)](https://github.com/felixdorn/human-id-generator/actions/workflows/tests.yml)
[![Formats](https://github.com/felixdorn/human-id-generator/actions/workflows/formats.yml/badge.svg?branch=main)](https://github.com/felixdorn/human-id-generator/actions/workflows/formats.yml)
[![Version](https://poser.pugx.org/felixdorn/human-id-generator/version)](//packagist.org/packages/felixdorn/human-id-generator)
[![Total Downloads](https://poser.pugx.org/felixdorn/human-id-generator/downloads)](//packagist.org/packages/felixdorn/human-id-generator)
[![License](https://poser.pugx.org/felixdorn/human-id-generator/license)](//packagist.org/packages/felixdorn/human-id-generator)

> This is a working POC, full of terrible code.

## Why? How?

Human IDs are IDs that are:

* Easy to say out loud
* Short
* Easy to type on a keyboard
* Have repeating characters or numbers when possible
* Have no confusing characters (e.g. 0 and O, 1 and I, etc.)

### Intended use cases

* Customer support
* Order numbers
* Invoice numbers
* Coupon codes
* Referral codes

These IDs are not intended to be used as primary keys in a database.

### Features

Features I want (from less feasible to most feasible):
* Sortability
* Collision resistance (in a way that makes sense considering the use case)
* URL-safe / Cookie-safe

## Installation

> Requires [PHP 8.2+](https://php.net/releases)

You can install the package via composer:

```bash
composer require felixdorn/human-id-generator
```

## Usage

// Usage goes here

## Structure

* 

## Testing

```bash
composer test
```

**human-id-generator** was created by **[Félix Dorn](https://felixdorn.fr)** under the *
*[MIT license](https://opensource.org/licenses/MIT)**.
