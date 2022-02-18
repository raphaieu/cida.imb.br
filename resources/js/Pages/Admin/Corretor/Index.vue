<template>
  <app-layout title="Complementar Perfil">
    <template #header>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Dados complementares do seu Perfil
        </h2>
    </template>
    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <jet-form-section @submitted="updateProfileExtraInformation">
                <template #title>
                    Informações do Perfil de Usuário
                </template>

                <template #description>
                    Atualiza seus dados de usuário e e-mail.
                </template>

                <template #form>
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="nome" value="Nome" />
                        <jet-input id="nome" type="text" class="block w-full mt-1" disabled="disabled" :value="$page.props.user.name" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="email" value="E-Mail" />
                        <jet-input id="email" type="email" class="block w-full mt-1" disabled="disabled" :value="$page.props.user.email" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="creci" value="CRECI" />
                        <jet-input id="creci" type="text" @focus="maskCreci()" class="block w-full mt-1" v-model="form.corretor_creci" />
                        <jet-input-error :message="form.errors.corretor_creci" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="phone" value="Telefone" />
                        <jet-phone id="phone" type="text" class="block w-full mt-1" v-model="form.corretor_contato" />
                        <jet-input-error :message="form.errors.corretor_contato" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <jet-label for="bio" value="Biografia" />
                        <ckeditor :editor="editor" v-model="form.corretor_bio" :config="editorConfig" rows="20" id="bio" class="block w-full mt-1"></ckeditor>
                        <jet-input-error :message="form.errors.corretor_bio" class="mt-2" />
                    </div>
                </template>
                <template #actions>
                    <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                        Salvo.
                    </jet-action-message>
                    <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Salvar
                    </jet-button>
                </template>
            </jet-form-section>
        </div>
    </div>
</app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetFormSection from '@/Jetstream/FormSection.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetActionMessage from '@/Jetstream/ActionMessage.vue'
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
import JetTextarea from '@/Jetstream/Textarea.vue'
import JetPhone from '@/Jetstream/Phone.vue'

import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
require('@ckeditor/ckeditor5-build-classic/build/translations/pt-br.js')

const VMasker = require('vanilla-masker');

export default defineComponent({
    components: {
        AppLayout,
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetSecondaryButton,
        JetTextarea,
        JetPhone,
    },
    props: ['user', 'corretor'],
    
    data() {
        return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    corretor_creci: this.corretor.corretor_creci,
                    corretor_bio: this.corretor.corretor_bio,
                    corretor_contato: this.corretor.corretor_contato
                }),
                editor: ClassicEditor,
                editorConfig: {
                    language: 'pt-br',
                    toolbar: {
                        items: [
                            'bold', 'italic',
                            'bulletedList', 'numberedList',
                            'blockQuote',
                        ],
                        shouldNotGroupWhenFull: true
                    },
                }
            }
    },
    methods: {
        updateProfileExtraInformation() {
            this.form.post(route('corretor.update', { corretor: this.user.id }), {
                errorBag: 'updateProfileExtraInformation',
                preserveScroll: false,
                onSuccess: () => {
                    this.form.reset();
                },
            });
        },

        maskCreci() {
            VMasker(document.getElementById("creci")).maskPattern("99.999");
        }
    }
});
</script>

<style>
.ck-content {
    min-height: 250px !important;
}
</style>