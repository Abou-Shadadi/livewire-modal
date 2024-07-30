# Livewire Modal

[![Latest Version on Packagist](https://img.shields.io/packagist/v/devsrv/livewire-modal.svg?style=flat-square)](https://packagist.org/packages/devsrv/livewire-modal)
[![Total Downloads](https://img.shields.io/packagist/dt/devsrv/livewire-modal.svg?style=flat-square)](https://packagist.org/packages/devsrv/livewire-modal)

Turn Laravel Livewire Component into Modal.

<img src="https://staging.voyantcs.com/sourav/static/livewire-modal-sample-alt.gif" width="720" />

## 🏷 Features

- Modal triggered by javascript i.e. opens instantly without waiting for livewire network round trip to finish ( no laggy feeling )
- Skeleton loading indicator
- Support alert message ( info, warning, success, danger )
- Trigger from Alpine Component / Vanilla JS / Livewire Class Component

## 🧾 Requirements

| **Bootstrap** | 4 or 5 | _no bootstrap support coming soon_ |
| ------------- | ------ | ---------------------------------- |
| Jquery        |        | _for bootstrap 4 only_             |
| Laravel       | >= 7   |                                    |
| Livewire      | >= 2.0 |                                    |
| Alpine JS     |        |                                    |

## 📥 Installation

```shell
composer require devsrv/livewire-modal
```

#### Include the base modal component

```html
<html>
  <head>
    ... @livewireStyles
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
  </head>
  <body>
    ...
    <x-livewiremodal-base /> 👈 @livewireScripts
  </body>
</html>
```

#### Publish assets

```shell
php artisan vendor:publish --provider="devsrv\LivewireModal\LivewireModalServiceProvider" --tag=public
```

#### Publish config

```shell
php artisan vendor:publish --provider="devsrv\LivewireModal\LivewireModalServiceProvider" --tag=config
```

> config support bootstrap theme: bs4 | bs5

### 📌 Updating

> **Important:** when updating the package make sure to re-publish the assets with `--force` flag

```shell
php artisan vendor:publish --provider="devsrv\LivewireModal\LivewireModalServiceProvider" --tag=public --force
```

## ⚗️ Usage

### <img src="https://laravel-livewire.com/favicon.ico" width="20" /> Create Livewire Component

No consideration required, create livewire component as usual. Use livewire's `mount` to handle passed parameters

### ✨ Open Modal

###### ✔️ From Alpine Component

```html
<div x-data>
  <button
    type="button"
    x-on:click='$dispatch("open-x-modal", {
    title: "Heading Title",
    modal: "livewire-component-name",
    size: "xl",
    args: {{ json_encode($data_array) }}
  })'
  >
    open
  </button>
</div>
```

###### ✔️ Via Vanilla JS

```html
<button
  type="button"
  onclick='_openModal("Heading", "component-name", {{ json_encode($data) }}, "sm")'
>
  open
</button>
```

###### ✔️ Via Trigger Blade Component

```html
<x-livewiremodal-trigger
  class="btn"
  title="Modal Heading"
  modal="component-name"
  :args="['sky' => 'blue', 'moon' => 1]"
  lg
  >open
</x-livewiremodal-trigger>
```

###### ✔️ From Livewire Class

```php
$this->dispatchBrowserEvent('open-x-modal', ['title' => 'My Modal', 'modal' => 'product.order', 'args' => ['id' => 1, 'rate' => 20]]);
```

> 💡 Modal size supports `sm` `lg` `xl` _// completely optional_

## 🌈 Bonus

you are free to put content in livewire view file in any structure, however the package provides an blade component for bootstrap modal which you can use as:

```html
<x-livewiremodal-modal>
  <div class="row">...</div>
  ...

  <x-slot name="footer">
    ...
    <button type="button" class="..">Save</button>
  </x-slot>
</x-livewiremodal-modal>
```

#### ✌🏼 Two reasons to use this component

🟢 a pretty line progress loading indicator which appears in the top when livewire loading state changes

🟢 alert notification message which can be triggered by:

```php
$this->info('<strong>Hi !</strong>, i am an alert');  // support `info` `warning` `success` `danger`
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## 👋🏼 Say Hi!

Leave a ⭐ if you find this package useful 👍🏼,
don't forget to let me know in [Twitter](https://twitter.com/srvrksh)
