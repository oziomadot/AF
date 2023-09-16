
<div x-data="imgPreview" x-cloak>
    <x-input-label for="profilePix"  :value="__('Picture')"/>        
    <x-forminput name="profilePix"  type="file" class="block mt-1 w-full" accept="image/*" 
    x-ref="myFile" @change="previewFile"/>
    <x-input-error :messages="$errors->get('profilePix')" class="mt-2" />    
        <template x-if="imgsrc">
            <p class="w-40">
            <img :src="imgsrc" class="imgPreview">
            </p>
        </template>
     </div> 