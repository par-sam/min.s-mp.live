<div class="flex justify-between items-center xl:items-start xl:justify-start xl:flex-col bg-white rounded-b-xl xl:rounded-b-none xl:rounded-r-xl shadow w-full xl:w-56 xl:h-full mb-4 xl:mb-0">
    <div class="flex items-center m-4">
        <h1 class="font-bold text-2xl mr-2">S-MP.live</h1>
        <?= badge("min") ?>
    </div>
    <i id="nav_btn" class="flex gg-menu-round md:hidden mr-4 text-gray-500"></i>
    <div class="hidden md:flex mr-8 xl:mr-0 xl:flex-col xl:w-full h-full justify-center items-center xl:items-stretch pl-4">
        <a href="?module=home">
            <button class="flex rounded-l-xl mx-4 xl:mx-0 items-center w-full h-10 transition hover:bg-gray-200 text-gray-500 hover:text-black">
                <div class="flex justify-center items-center w-10"><i class="gg-home"></i></div>
                <span class="text-xl">Accueil</span>
            </button>
        </a>
        <a href="?module=horaire">
            <button class="flex rounded-l-xl mx-4 xl:mx-0 items-center w-full h-10 transition hover:bg-gray-200 text-gray-500 hover:text-black">
                <div class="flex justify-center items-center w-10"><i class="gg-list"></i></div>
                <span class="text-xl">Horaire</span>
            </button>
        </a>
        <a href="?module=profile">
            <button class="flex rounded-l-xl mx-4 xl:mx-0 items-center w-full h-10 transition hover:bg-gray-200 text-gray-500 hover:text-black">
                <div class="flex justify-center items-center w-10"><i class="gg-profile"></i></div>
                <span class="text-xl">Profil</span>
            </button>
        </a>
        <a href="?module=notes">
            <button class="flex rounded-l-xl ml-4 xl:ml-0 items-center w-full h-10 transition hover:bg-gray-200 text-gray-500 hover:text-black">
                <div class="flex justify-center items-center w-10"><i class="gg-pen"></i></div>
                <span class="text-xl">Notes</span>
            </button>
        </a>
    </div>
</div>

<div id="nav_menu" class="absolute hidden justify-center items-center w-screen h-screen bg-gray-200">
    <div class="flex flex-col justify-center items-center text-gray-500 text-3xl bg-white rounded-xl shadow py-4 px-10">
        <a class="flex my-4" href="?module=home">
            <div class="flex justify-center items-center w-10"><i class="gg-home"></i></div>
            Accueil
        </a>
        <a class="flex my-4" href="?module=horaire">
            <div class="flex justify-center items-center w-10"><i class="gg-list"></i></div>
            Horaire
        </a>
        <a class="flex my-4" href="?module=profile">
            <div class="flex justify-center items-center w-10"><i class="gg-profile"></i></div>
            Profil
        </a>
        <a class="flex my-4" href="?module=notes">
            <div class="flex justify-center items-center w-10"><i class="gg-pen"></i></div>
            Notes
        </a>
        <a class="flex mt-10 text-red-500" id="nav_menu_close">
            <div class="flex justify-center items-center w-10"><i class="gg-close-o"></i></div>
            Fermer
        </a>
    </div>
</div>