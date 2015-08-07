# PHP Closures/Lambdas for 5.2

A small experiment to providing closure-like capabilities in PHP 5.2. This is
a limited project and is only intended as a small polyfill-like solution for
those with PHP hosts that still do not provide 5.3+ and would like some of the
benefits of 5.3+'s closures (namely variable importing).

**Note**: this solution currently does not pass the imported variables by
reference.

# Initialization

Either load the global `lambda` function from this project:

```php
// Give global function 'lambda'
include 'lambda-global.php';
```

Or load the local version into a variable:

```php
// Defines local function $lambda
$lambda = include 'lambda-local.php';
```

# Syntax

```php
$lambda(array(
  'args' => array(/* */),  // Arguments for the new function
  'use'  => array(/* */),  // Variables to import into the scope of the function
  'fn'   => /* */,         // Body of the function
));
```

# Usage

```php
$l = include 'lambda-local.php';

// Define some variables
$x = 3;
$y = 4;

// Create a closure that uses $x and $y
$myClosure = $l(array('args' => array('$z'), 'use' => array('$x' => $x, '$y' => $y), '
  return $z * $y * $z;
'));

$myClosure(5); // 60

```