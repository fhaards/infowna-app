{{-- GLOBAL JAVASCRIPT LOAD --}}
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
{{-- <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script> --}}

{{-- PUSH JS --}}
@stack('js-stacks')
