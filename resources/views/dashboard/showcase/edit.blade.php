@extends('layouts.dashboard.main')

@section('content')
    <div class="flex items-center gap-3">
        <button id="back-btn" class="cursor-pointer">
            <svg class="size-6 md:size-8 fill-black" viewBox="0 0 22 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8.65961 15L16.9955 23.3946C17.3873 23.7892 17.5833 24.2915 17.5833 24.9013C17.5833 25.5112 17.3873 26.0135 16.9955 26.4081C16.6036 26.8027 16.1049 27 15.4993 27C14.8937 27 14.395 26.8027 14.0031 26.4081L4.17107 16.5067C3.95733 16.2915 3.80629 16.0583 3.71794 15.8072C3.62959 15.5561 3.58471 15.287 3.58328 15C3.58186 14.713 3.62674 14.4439 3.71794 14.1928C3.80914 13.9417 3.96018 13.7085 4.17107 13.4933L14.0031 3.59193C14.395 3.19731 14.8937 3 15.4993 3C16.1049 3 16.6036 3.19731 16.9955 3.59193C17.3873 3.98655 17.5833 4.48879 17.5833 5.09865C17.5833 5.70852 17.3873 6.21076 16.9955 6.60538L8.65961 15Z"/>
            </svg>
        </button>
        <span class="text-xl md:text-2xl font-bold">Edit <span class="text-five">Artwork</span></span>
    </div>

    <form id="showcase-form" action="{{ route('dashboard.showcase.update', $showcase->slug) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4 mt-6">
        @csrf
        @method("PUT")
        <div class="flex flex-col gap-2">
            <h2 class="text-lg font-semibold">Detail Karya</h2>
            
            <!-- Title Field -->
            <div class="flex flex-col gap-1">
                <div class="flex gap-1 items-center">
                    <label for="title" class="font-semibold">Judul</label>
                    <span class="text-red-500">*</span>
                </div>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    class="border border-gray-300 px-4 py-2 rounded-lg @error('title') border-red-500 @enderror" 
                    placeholder="Masukkan judul karya"
                    value="{{ old('title', $showcase->title) }}"
                    
                >
                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Cover Field -->
            <div class="flex flex-col gap-1">
                <div class="flex gap-1 items-center">
                    <label for="cover" class="font-semibold">Sampul</label>
                </div>
                <div class="h-27 w-48 max-w-full rounded-md border border-gray-300 bg-gray-100 flex items-center justify-center overflow-hidden">
                    <img src="{{ Storage::url($showcase->cover) }}" id="previewCover" class="object-cover w-full h-full" alt="Preview">
                </div>
                <input 
                    type="file" 
                    name="cover" 
                    id="cover"
                    accept="image/jpeg,image/png,image/jpg"
                    class="hidden"
                    onchange="handleFileChange(event)"
                    
                >
                <label for="cover" class="flex items-center cursor-pointer">
                    <span id="labelCoverFileName" class="h-full w-full px-3 py-2 lg:px-4 lg:py-2 text-sm lg:text-base rounded-l-md rounded-r-none border border-r-0 bg-light text-gray-600 border-gray-300">Tidak ada file terpilih</span>
                    <div class="h-full p-1 rounded-r-md border border-l-0 bg-light border-gray-300">
                        <div class="text-sm lg:text-base cursor-pointer px-4 py-1 bg-main-gradient text-light rounded-md hover:opacity-90 transition">
                            Choose
                        </div>
                    </div>
                </label>
                <p class="text-xs text-gray-500 mt-1">.jpg, .jpeg, .png | maks. 1MB</p>
                @error('cover')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Team Field -->
            <div class="flex flex-col gap-1">
                <div class="flex gap-1 items-center">
                    <label for="team_id" class="font-semibold">Team</label>
                    <span class="text-red-500">*</span>
                </div>
                <select name="team_id" id="team_id" class="border border-gray-300 px-4 py-2 rounded-lg @error('team_id') border-red-500 @enderror" >
                    <option value="">Pilih team</option>
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}" {{ old('team_id', $showcase->team_id) == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                    @endforeach
                </select>
                @error('team_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Champion Field -->
            <div class="flex flex-col gap-1">
                <div class="flex gap-1 items-center">
                    <label for="champion" class="font-semibold">Juara</label>
                    <span class="text-red-500">*</span>
                </div>
                <div class="flex flex-wrap items-center gap-4">
                    <div class="flex items-center gap-2">
                        <input type="radio" name="champion" class="cursor-pointer" id="champion_first" value="1" {{ old('champion', $showcase->champion) == '1' ? 'checked' : '' }} >
                        <label for="champion_first" class="cursor-pointer">
                            <svg class="size-8" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.2723 1.06044C17.0023 1.30044 14.9023 5.46794 14.9023 5.46794L13.3398 11.7704L19.4198 11.2129C19.4198 11.2129 24.4773 1.80794 24.5798 1.59044C24.7623 1.19544 24.8598 1.03294 24.1623 1.03294C23.4648 1.03044 17.5248 0.835444 17.2723 1.06044Z" fill="#176CC7"/>
                                <path d="M20.42 10.8227C20.1175 10.6602 11.2075 10.5202 10.9975 10.8227C10.8075 11.0977 10.835 12.3552 10.9275 12.5177C11.02 12.6802 14.015 14.0727 14.015 14.0727L14.0125 14.5802C14.0125 14.5802 14.1775 14.9777 15.8475 14.9777C17.5175 14.9777 17.69 14.6402 17.69 14.6402L17.705 14.1277C17.705 14.1277 20.3275 12.8177 20.465 12.7027C20.605 12.5852 20.7225 10.9852 20.42 10.8227ZM17.675 12.9052C17.675 12.9052 17.6675 12.5552 17.495 12.4677C17.3225 12.3802 14.545 12.3952 14.31 12.4077C14.075 12.4202 14.075 12.8402 14.075 12.8402L12.175 11.9152V11.7302L19.25 11.7802L19.2625 11.9902L17.675 12.9052Z" fill="#FCC417"/>
                                <path d="M14.8148 12.793C14.5798 12.793 14.4448 13.038 14.4448 13.4605C14.4448 13.8555 14.5798 14.188 14.8773 14.163C15.1223 14.143 15.2073 13.768 15.1848 13.4355C15.1623 13.0405 15.1123 12.793 14.8148 12.793Z" fill="#FDFFFF"/>
                                <path d="M7.24512 22.6805C7.24512 28.6705 12.6601 31.338 16.2601 31.2105C20.2301 31.068 24.9851 27.973 24.6976 22.258C24.4251 16.843 19.8701 14.2755 15.9251 14.303C11.3401 14.3355 7.24512 17.448 7.24512 22.6805Z" fill="#FCC417"/>
                                <path d="M16.1326 30.1675C16.0701 30.1675 16.0051 30.1675 15.9426 30.165C14.0676 30.1025 12.2151 29.3125 10.8601 28C9.41009 26.595 8.61509 24.695 8.62509 22.6525C8.64759 17.665 13.0076 15.3525 15.9651 15.3525H15.9901C19.9976 15.37 23.2876 18.485 23.3801 22.7075C23.4201 24.5875 22.6501 26.56 21.1401 28.045C19.7301 29.4275 17.8601 30.1675 16.1326 30.1675ZM15.9601 16.1825C13.3076 16.1825 9.38509 18.3525 9.37509 22.6525C9.36759 25.8675 11.8576 29.1725 16.0051 29.3125C17.5851 29.3625 19.2126 28.7575 20.5276 27.465C21.8926 26.1225 22.6601 24.3925 22.6326 22.7175C22.5726 19.085 19.6026 16.195 15.9976 16.18C15.9876 16.18 15.9676 16.1825 15.9601 16.1825Z" fill="#FA912C"/>
                                <path d="M14.4552 15.1529C14.2827 14.9154 12.3277 14.9604 10.4802 16.7654C8.69767 18.5079 8.50517 20.1504 8.84767 20.2454C9.23517 20.3529 9.70767 18.6129 11.3402 17.1504C12.8402 15.8104 14.8002 15.6254 14.4552 15.1529ZM22.0177 21.6204C21.4152 21.7054 22.0402 23.5104 20.6427 25.5304C19.4302 27.2829 18.0552 27.9179 18.2152 28.3029C18.4302 28.8179 20.6327 27.5354 21.6527 25.4454C22.5777 23.5529 22.4677 21.5554 22.0177 21.6204Z" fill="#FEFFFA"/>
                                <path d="M13.9625 19.2546C13.8325 19.4471 13.95 21.1346 14.0275 21.2096C14.1775 21.3596 15.3175 20.8221 15.3175 20.8221L15.275 25.3346C15.275 25.3346 14.4375 25.3246 14.35 25.3571C14.1775 25.4221 14.2 27.1621 14.3275 27.2471C14.455 27.3321 17.8725 27.3771 18.0025 27.2046C18.1325 27.0321 18.1 25.5096 18.04 25.4396C17.9325 25.3096 17.115 25.3621 17.115 25.3621C17.115 25.3621 17.185 18.7171 17.1625 18.5046C17.14 18.2921 16.905 18.1596 16.625 18.2246C16.345 18.2896 14.045 19.1296 13.9625 19.2546Z" fill="#FA912C"/>
                                <path d="M6.37755 0.930104C6.22005 1.0751 12.2425 11.8001 12.2425 11.8001C12.2425 11.8001 13.2525 11.9301 15.5075 11.9501C17.7625 11.9701 18.88 11.8201 18.88 11.8201C18.88 11.8201 14.1975 1.0376 13.9175 0.930104C13.78 0.875104 11.925 0.855104 10.1125 0.835104C8.29755 0.812604 6.52755 0.790104 6.37755 0.930104Z" fill="#2E9DF4"/>
                            </svg>
                        </label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="champion" class="cursor-pointer" id="champion_runner_up" value="2" {{ old('champion', $showcase->champion) == '2' ? 'checked' : '' }} >
                        <label for="champion_runner_up" class="cursor-pointer">
                            <svg class="size-8" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.2723 1.06044C17.0023 1.30044 14.9023 5.46794 14.9023 5.46794L13.3398 11.7704L19.4198 11.2129C19.4198 11.2129 24.4773 1.80794 24.5798 1.59044C24.7623 1.19544 24.8598 1.03294 24.1623 1.03294C23.4648 1.03044 17.5248 0.835444 17.2723 1.06044Z" fill="#176CC7"/>
                                <path d="M20.4202 10.8227C20.1177 10.6602 11.2077 10.5202 10.9977 10.8227C10.8077 11.0977 10.9152 12.5402 10.9877 12.7127C11.1177 13.0127 13.9952 14.3202 13.9952 14.3202L13.9402 14.9152C13.9402 14.9152 14.1752 14.9752 15.8477 14.9752C17.5202 14.9752 17.8502 14.8902 17.8502 14.8902L17.8552 14.3527C17.8552 14.3527 20.4452 13.0927 20.5752 12.9177C20.6852 12.7727 20.7227 10.9852 20.4202 10.8227ZM17.7677 13.1027C17.7677 13.1027 17.8502 12.7352 17.6777 12.6502C17.5052 12.5627 14.5452 12.6027 14.3102 12.6152C14.0752 12.6277 14.0752 13.0477 14.0752 13.0477L12.1752 11.9152V11.7302L19.2502 11.7802L19.2627 11.9902L17.7677 13.1027Z" fill="#CECDD2"/>
                                <path d="M14.8148 12.793C14.5798 12.793 14.4448 13.038 14.4448 13.4605C14.4448 13.8555 14.5798 14.188 14.8773 14.163C15.1223 14.143 15.2073 13.768 15.1848 13.4355C15.1623 13.0405 15.1123 12.793 14.8148 12.793Z" fill="#FDFFFF"/>
                                <path d="M7.24268 22.9724C7.24268 28.9624 12.7552 31.5049 16.3577 31.3974C20.5552 31.2724 24.9852 28.0874 24.6977 22.3724C24.4252 16.9574 19.8327 14.5499 15.8877 14.5774C11.3027 14.6124 7.24268 17.7399 7.24268 22.9724Z" fill="#CECDD2"/>
                                <path d="M16.1326 30.2828C16.0701 30.2828 16.0051 30.2828 15.9426 30.2803C14.0676 30.2178 12.2151 29.4278 10.8601 28.1153C9.41009 26.7103 8.61509 24.8103 8.62509 22.7678C8.64759 17.7803 13.0076 15.4678 15.9651 15.4678H15.9901C19.9976 15.4853 23.2876 18.6003 23.3801 22.8228C23.4201 24.7028 22.6501 26.6753 21.1401 28.1603C19.7301 29.5428 17.8601 30.2828 16.1326 30.2828ZM15.9601 16.2978C13.3076 16.2978 9.38509 18.4678 9.37509 22.7678C9.36759 25.9828 11.8576 29.2878 16.0051 29.4278C17.5851 29.4778 19.2126 28.8728 20.5276 27.5803C21.8926 26.2378 22.6601 24.5078 22.6326 22.8328C22.5676 19.2003 19.5976 16.3103 15.9926 16.2928C15.9876 16.2928 15.9676 16.2978 15.9601 16.2978Z" fill="#9B9B9D"/>
                                <path d="M14.5225 15.3678C14.35 15.1303 12.5825 15.1978 10.68 16.8353C8.78996 18.4628 8.50746 20.2628 8.84746 20.3578C9.23496 20.4653 9.70746 18.7253 11.34 17.2628C12.84 15.9253 14.865 15.8403 14.5225 15.3678ZM21.97 21.9303C21.3675 22.0153 21.9925 23.8203 20.595 25.8403C19.3825 27.5928 18.0075 28.2278 18.1675 28.6128C18.3825 29.1278 20.585 27.8453 21.605 25.7553C22.5275 23.8653 22.4175 21.8678 21.97 21.9303Z" fill="#FEFFFA"/>
                                <path d="M6.37755 0.930104C6.22005 1.0751 12.2425 11.8001 12.2425 11.8001C12.2425 11.8001 13.2525 11.9301 15.5075 11.9501C17.7625 11.9701 18.88 11.8201 18.88 11.8201C18.88 11.8201 14.1975 1.0376 13.9175 0.930104C13.78 0.875104 11.925 0.855104 10.1125 0.835104C8.29755 0.812604 6.52755 0.790104 6.37755 0.930104Z" fill="#2E9DF4"/>
                                <path d="M14.2125 21.5875C14.4725 21.59 14.705 21.2375 14.92 21.0225C15.3775 20.5625 15.8575 20.1975 16.405 20.6925C17.75 21.915 15.05 23.155 14.025 24.85C13.26 26.115 13.105 27.0875 13.3175 27.3475C13.53 27.6075 18.7025 27.595 18.7725 27.465C18.8425 27.335 18.915 25.6025 18.795 25.52C18.675 25.4375 16.1325 25.485 16.1325 25.485C16.1325 25.485 16.345 24.99 17.2175 24.235C18.175 23.4075 18.9425 22.27 18.7375 20.925C18.3125 18.145 15.5125 18.0425 14.3 19.01C13.1175 19.9525 13.3725 21.5775 14.2125 21.5875Z" fill="#9B9B9D"/>
                            </svg>
                        </label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="champion" class="cursor-pointer" id="champion_third" value="3" {{ old('champion', $showcase->champion) == '3' ? 'checked' : '' }} >
                        <label for="champion_third" class="cursor-pointer">
                            <svg class="size-8" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.2723 1.06044C17.0023 1.30044 14.9023 5.46794 14.9023 5.46794L13.3398 11.7704L19.4198 11.2129C19.4198 11.2129 24.4773 1.80794 24.5798 1.59044C24.7623 1.19544 24.8598 1.03294 24.1623 1.03294C23.4648 1.03044 17.5248 0.835444 17.2723 1.06044Z" fill="#176CC7"/>
                                <path d="M20.4202 10.8227C20.1177 10.6602 11.2077 10.5202 10.9977 10.8227C10.8077 11.0977 10.9152 12.5402 10.9877 12.7127C11.1177 13.0127 13.9952 14.3202 13.9952 14.3202L13.9402 14.9152C13.9402 14.9152 14.1752 14.9752 15.8477 14.9752C17.5202 14.9752 17.8502 14.8902 17.8502 14.8902L17.8552 14.3527C17.8552 14.3527 20.4452 13.0927 20.5752 12.9177C20.6852 12.7727 20.7227 10.9852 20.4202 10.8227ZM17.7677 13.1027C17.7677 13.1027 17.8502 12.7352 17.6777 12.6502C17.5052 12.5627 14.5452 12.6027 14.3102 12.6152C14.0752 12.6277 14.0752 13.0477 14.0752 13.0477L12.2102 12.0877L12.1752 11.7302L19.2502 11.7802L19.2252 12.1177L17.7677 13.1027Z" fill="#F79429"/>
                                <path d="M14.8148 12.9727C14.5798 12.9727 14.4448 13.2177 14.4448 13.6402C14.4448 14.0352 14.5798 14.3677 14.8773 14.3427C15.1223 14.3227 15.2073 13.9477 15.1848 13.6152C15.1623 13.2177 15.1123 12.9727 14.8148 12.9727Z" fill="#FDFFFF"/>
                                <path d="M7.32764 23.0224C7.32764 29.0124 12.7551 31.5049 16.3576 31.3974C20.5551 31.2724 25.0701 28.0874 24.6976 22.3724C24.3476 17.0099 19.8326 14.5499 15.8876 14.5774C11.3026 14.6124 7.32764 17.7899 7.32764 23.0224Z" fill="#F79429"/>
                                <path d="M16.1673 30.4927C16.1048 30.4927 16.0398 30.4927 15.9773 30.4902C14.1023 30.4277 12.2498 29.6377 10.8948 28.3252C9.44476 26.9202 8.64976 25.0202 8.65976 22.9777C8.68226 17.9902 13.0423 15.6777 15.9998 15.6777H16.0248C20.0323 15.6952 23.3223 18.8102 23.4148 23.0327C23.4548 24.9127 22.8548 26.7827 21.3448 28.2677C19.9348 29.6477 17.8948 30.4927 16.1673 30.4927ZM15.9948 16.5077C13.3423 16.5077 9.41976 18.6777 9.40976 22.9777C9.40226 26.1927 11.8923 29.4977 16.0398 29.6377C17.6198 29.6877 19.4023 29.1027 20.7148 27.8127C22.0798 26.4702 22.6923 24.7202 22.6648 23.0452C22.6048 19.4127 19.6348 16.5227 16.0298 16.5077C16.0223 16.5027 16.0023 16.5077 15.9948 16.5077Z" fill="#D25116"/>
                                <path d="M14.5225 15.3678C14.35 15.1303 12.5825 15.1978 10.68 16.8353C8.78996 18.4628 8.50746 20.2628 8.84746 20.3578C9.23496 20.4653 9.70746 18.7253 11.34 17.2628C12.84 15.9253 14.865 15.8403 14.5225 15.3678ZM22.12 21.9103C21.5175 21.9953 22.1425 23.8003 20.745 25.8203C19.5325 27.5728 18.1575 28.2078 18.3175 28.5928C18.5325 29.1078 20.735 27.8253 21.755 25.7353C22.6775 23.8428 22.5675 21.8453 22.12 21.9103Z" fill="#FEFFFA"/>
                                <path d="M6.37755 0.930104C6.22005 1.0751 12.2425 11.8001 12.2425 11.8001C12.2425 11.8001 13.2525 11.9301 15.5075 11.9501C17.7625 11.9701 18.88 11.8201 18.88 11.8201C18.88 11.8201 14.1975 1.0376 13.9175 0.930104C13.78 0.875104 11.925 0.855104 10.1125 0.835104C8.29755 0.812604 6.52755 0.790104 6.37755 0.930104Z" fill="#2E9DF4"/>
                                <path d="M18.7376 20.9273C18.4476 18.4148 15.5226 18.2048 14.3101 19.1698C13.1301 20.1098 13.2426 21.4198 14.0701 21.5723C14.7226 21.6923 14.8926 21.1748 15.0826 20.9373C15.5126 20.4048 16.1976 20.3548 16.6451 20.7823C17.1526 21.2698 16.8401 22.4348 16.0776 22.4823C15.5101 22.5173 15.2226 22.4873 15.1501 22.5848C15.0476 22.7223 15.0626 23.8048 15.1676 23.9248C15.2876 24.0623 15.7676 23.9773 16.1801 23.9923C16.7476 24.0148 17.3501 24.8548 16.9526 25.4848C16.5401 26.1373 15.4426 25.8448 15.0476 25.4498C14.5251 24.9273 14.0026 25.2273 13.8276 25.4323C13.5526 25.7573 13.2601 26.4973 14.2751 27.2173C15.2876 27.9373 18.3601 28.0748 18.9801 25.8448C19.5201 23.8973 18.2601 23.0973 18.2601 23.0973C18.2601 23.0973 18.9026 22.3598 18.7376 20.9273Z" fill="#D25116"/>
                            </svg>
                        </label>
                    </div>
                    <div class="flex items-center gap-2">
                        <input type="radio" name="champion" class="cursor-pointer" id="champion_not" value="0" {{ old('champion', $showcase->champion) == '0' || old('champion', $showcase->champion) == null  ? 'checked' : '' }} >
                        <label for="champion_not" class="cursor-pointer">
                            <svg class="size-8" viewBox="0 0 18 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.0595 7.05898C16.6454 6.47305 16.6454 5.52148 16.0595 4.93555C15.4735 4.34961 14.522 4.34961 13.936 4.93555L9.0001 9.87617L4.05947 4.94023C3.47354 4.3543 2.52197 4.3543 1.93604 4.94023C1.3501 5.52617 1.3501 6.47773 1.93604 7.06367L6.87666 11.9996L1.94072 16.9402C1.35479 17.5262 1.35479 18.4777 1.94072 19.0637C2.52666 19.6496 3.47822 19.6496 4.06416 19.0637L9.0001 14.123L13.9407 19.059C14.5267 19.6449 15.4782 19.6449 16.0642 19.059C16.6501 18.473 16.6501 17.5215 16.0642 16.9355L11.1235 11.9996L16.0595 7.05898Z" fill="#EB5757"/>
                            </svg>
                        </label>
                    </div>
                </div>
                @error('champion')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Description Field -->
            <div class="flex flex-col gap-1">
                <div class="flex gap-1 items-center">
                    <label for="description" class="font-semibold">Deskripsi</label>
                    <span class="text-red-500">*</span>
                </div>
                <textarea 
                    name="description" 
                    class="border border-gray-300 px-4 py-2 rounded-lg @error('description') border-red-500 @enderror" 
                    id="description" 
                    rows="5" 
                    placeholder="Masukkan deskripsi"
                    
                >{{ old('description', $showcase->description) }}</textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- YouTube Link Field -->
            <div class="flex flex-col gap-1">
                <div class="flex gap-1 items-center">
                    <label for="link_youtube" class="font-semibold">Link YouTube</label>
                    <span class="text-red-500">*</span>
                </div>
                <input 
                    type="url" 
                    id="link_youtube" 
                    name="link_youtube" 
                    class="border border-gray-300 px-4 py-2 rounded-lg @error('link_youtube') border-red-500 @enderror" 
                    placeholder="Masukkan link YouTube"
                    value="{{ old('link_youtube', $showcase->youtubeWatchUrl) }}"
                    
                >
                <span id="youtubeError" class="text-red-500 text-sm hidden"></span>
                @error('link_youtube')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
                
                <!-- YouTube Preview -->
                <div class="relative w-full max-w-full lg:max-w-2xl aspect-video rounded-lg md:rounded-xl overflow-hidden">
                    <iframe id="ytplayer" type="text/html" 
                        src="{{ $showcase->youtubeEmbedUrl }}" 
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none; background-color: rgb(196, 196, 196);"
                        frameborder="0">
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex gap-4 items-center">
            <button 
                type="button" 
                id="cancel-btn"
                class="w-full p-[2px] rounded-full bg-gradient-to-r from-six to-seven inline-block"
            >
                <div class="hover:bg-transparent transition-all duration-300 cursor-pointer py-3 px-5 rounded-full bg-light text-black hover:text-light w-full h-full text-sm md:text-base font-semibold">
                    Batal
                </div>
            </button>
            <div class="w-full p-[2px] rounded-full bg-gradient-to-r from-six to-seven inline-block">
                <button 
                    class="w-full cursor-pointer bg-main-gradient py-3 px-5 text-light rounded-full font-semibold text-sm md:text-base" 
                    type="submit"
                    id="submit-btn"
                >
                    <span id="submit-text">Perbarui</span>
                    <span id="submit-loading" class="hidden">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Memperbarui...
                    </span>
                </button>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        const previewCover = document.getElementById('previewCover');
        const labelCoverFileName = document.getElementById('labelCoverFileName');
        
        function handleFileChange(event) {
            const file = event.target.files[0];
            const fileName = file ? file.name : "Tidak ada file terpilih";

            labelCoverFileName.textContent = fileName;

            if (file) {
                if (file.size > 1024 * 1024) {
                    modal.alert({
                        message: 'Ukuran file terlalu besar. Maksimal 1MB!',
                        type: 'error'
                    });
                    event.target.value = '';
                    labelCoverFileName.textContent = "Tidak ada file terpilih";
                    previewCover.src = "{{ asset('assets/images/img-default.png') }}";
                    return;
                }

                const reader = new FileReader();
                reader.onload = (e) => {
                    previewCover.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                previewCover.src = "{{ asset('assets/images/img-default.png') }}";
            }
        }

        const inputYoutube = document.getElementById('link_youtube');
        const ytPlayer = document.getElementById('ytplayer');
        const youtubeError = document.getElementById('youtubeError');

        function extractYoutubeId(url) {
            const regex = /(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/))([\w-]{11})/;
            const match = url.match(regex);
            return match ? match[1] : null;
        }

        inputYoutube.addEventListener('input', function() {
            const videoId = extractYoutubeId(this.value);

            if (this.value.trim() === "") {
                ytPlayer.src = "";
                youtubeError.classList.add("hidden");
                youtubeError.textContent = "";
                return;
            }

            if (videoId) {
                ytPlayer.src = `https://www.youtube.com/embed/${videoId}`;
                youtubeError.classList.add("hidden");
                youtubeError.textContent = "";
            } else {
                ytPlayer.src = "";
                youtubeError.textContent = "Link YouTube tidak valid!";
                youtubeError.classList.remove("hidden");
            }
        });
        
        const modal = new ReusableModal();

        document.addEventListener('DOMContentLoaded', () => {
            window.formHandler = new FormHandler({
                formId: "showcase-form",
                redirectUrl: "{{ route('dashboard.showcase.index') }}",
                successMessage: "Showcase berhasil ditambahkan!",
                validators: (ctx) => {
                    let isValid = true;

                    // Validate title
                    const title = document.getElementById('title');
                    if (!title.value.trim()) {
                        ctx.showFieldError(title, 'Judul wajib diisi.');
                        isValid = false;
                    }

                    // Validate team
                    const teamId = document.getElementById('team_id');
                    if (!teamId.value) {
                        ctx.showFieldError(teamId, 'Team wajib dipilih.');
                        isValid = false;
                    }

                    // Validate champion
                    const champion = document.querySelector('input[name="champion"]:checked');
                    if (!champion) {
                        modal.alert({
                            message: 'Status juara wajib dipilih.',
                            type: 'error'
                        });
                        isValid = false;
                    }

                    const description = document.getElementById('description');
                    if (!description.value.trim()) {
                        ctx.showFieldError(description, 'Deskripsi wajib diisi.');
                        isValid = false;
                    }

                    const linkYoutube = document.getElementById('link_youtube');
                    if (!linkYoutube.value.trim()) {
                        ctx.showFieldError(linkYoutube, 'Link YouTube wajib diisi.');
                        isValid = false;
                    } else if (!extractYoutubeId(linkYoutube.value)) {
                        ctx.showFieldError(linkYoutube, 'Link YouTube tidak valid.');
                        isValid = false;
                    }

                    return isValid;
                }
            });
        });
    </script>
@endsection