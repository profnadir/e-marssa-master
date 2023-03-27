<x-mail::message>
# Introduction

<ul>
    <li> Name : {{ $product->name }}</li>
    <li> Price : {{ $product->price }}</li>
    <li> Description : {{ $product->description }}</li>
</ul>

<x-mail::button :url="route('products.index')">
Produits
</x-mail::button>

<x-mail::table>
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
</x-mail::table>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
