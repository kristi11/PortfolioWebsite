<!-- Change the colour #f8fafc to match the previous section colour -->
<x-public-profile.footer-s-v-g/>

<section class="container mx-auto text-center py-6 mb-12">
    <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">
        Have a question?
    </h2>
    <div class="w-full mb-4">
        <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
    </div>
    <h3 class="my-4 text-3xl leading-tight">
        Feel free to contact me.
    </h3>
    <livewire:secure-mailto email="{{$user->email}}" />
</section>