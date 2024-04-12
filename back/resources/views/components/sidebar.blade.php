<!-- start sidebar -->
<div id="sideBar" class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">
    <!-- sidebar content -->
    <div class="flex flex-col">
        <!-- sidebar toggle -->
        <div class="text-right hidden md:block mb-4">
            <button id="sideBarHideBtn">
                <i class="fad fa-times-circle"></i>
            </button>
        </div>
        <!-- end sidebar toggle -->
        <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">Imóveis</p>
        <a href="{{ route('imovel.listar') }}" title="Listar Imóveis" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-home-heart text-sm mr-2"></i>
            Gerenciar
        </a>
        <a href="{{ route('imovel.inserir') }}" title="Inserir novo Imóvel" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-clinic-medical text-sm mr-2"></i>
            Novo
        </a>
        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Características</p>
        <a href="{{ route('imovel.caracteristica') }}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-house text-sm mr-2"></i>
            do Imóvel
        </a>
        <a href="{{ route('edificio.caracteristica') }}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-building text-sm mr-2"></i>
            do Edifício
        </a>
        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Configurações</p>
        <a href="{{ route('config.negocio') }}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-envelope-open-dollar text-sm mr-2"></i>
            Tipo de Negócio
        </a>
        <a href="{{ route('config.imovel') }}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-book text-sm mr-2"></i>
            Tipo de Imóvel
        </a>
        <a href="{{ route('config.endereco') }}" class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-globe-americas text-sm mr-2"></i>
            Regiões / Endereços
        </a>
    </div>
    <!-- end sidebar content -->
</div>
<!-- end sidbar -->
