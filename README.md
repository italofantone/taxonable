# About Sluggable

A Laravel package to manage flexible content taxonomy with taggable support for Eloquent models.

> ⚠️ This code was used for educational purposes [...]

### Installation

```
composer require italofantone/taxonable
```

### Usage

1. Add the trait to your model:

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Italofantone\Taxonable\Traits\HasTags;

class Lesson extends Model
{
    use HasTags;
}
```

2. Methods:

```
// model = lesson

$model->addTag($tag);
$model->removeTag($tag);
$model->syncTags($tag); // recommended
```

## Contact

- **Email**: [i@rimorsoft.com](mailto:i@rimorsoft.com)
- **LinkedIn**: [italofantone](https://linkedin.com/in/italofantone)

## Donations

If you find this project useful and would like to support its development, you can make a donation via PayPal:

- **PayPal:** [Donate via PayPal](https://paypal.me/italofantone)

Thank you for your support!