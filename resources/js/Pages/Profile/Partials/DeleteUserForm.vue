<template>
    <jet-action-section>
        <template #title>
            Excluir Conta
        </template>

        <template #description>
            Excluir sua conta do sistema.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                Uma vez que sua conta é excluída do sistema, todos seu conteúdo e dados serão permanenetemente apagados. Antes de apagar tudo da sua conta, faça o download das informações que achar pertinente.
            </div>
            <div class="mt-5">
                <jet-danger-button @click="confirmUserDeletion">
                    Excluir Conta
                </jet-danger-button>
            </div>
            <!-- Delete Account Confirmation Modal -->
            <jet-dialog-modal :show="confirmingUserDeletion" @close="closeModal">
                <template #title>
                    Excluir Conta
                </template>

                <template #content>
                    Você tem certeza que quer excluir sua conta? Uma vez que sua conta é excluída do sistema, todos seu conteúdo e dados serão permanenetemente apagados. Antes de apagar tudo da sua conta, faça o download das informações que achar pertinente.
                    <div class="mt-4">
                        <jet-input type="password" class="block w-3/4 mt-1" placeholder="Senha"
                                    ref="password"
                                    v-model="form.password"
                                    @keyup.enter="deleteUser" />
                        <jet-input-error :message="form.errors.password" class="mt-2" />
                    </div>
                </template>

                <template #footer>
                    <jet-secondary-button @click="closeModal">
                        Cancelar
                    </jet-secondary-button>
                    <jet-danger-button class="ml-3" @click="deleteUser" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Excluir
                    </jet-danger-button>
                </template>
            </jet-dialog-modal>
        </template>
    </jet-action-section>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetActionSection from '@/Jetstream/ActionSection.vue'
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
    import JetDangerButton from '@/Jetstream/DangerButton.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'

    export default defineComponent({
        components: {
            JetActionSection,
            JetDangerButton,
            JetDialogModal,
            JetInput,
            JetInputError,
            JetSecondaryButton,
        },

        data() {
            return {
                confirmingUserDeletion: false,

                form: this.$inertia.form({
                    password: '',
                })
            }
        },

        methods: {
            confirmUserDeletion() {
                this.confirmingUserDeletion = true;

                setTimeout(() => this.$refs.password.focus(), 250)
            },

            deleteUser() {
                this.form.delete(route('current-user.destroy'), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onError: () => this.$refs.password.focus(),
                    onFinish: () => this.form.reset(),
                })
            },

            closeModal() {
                this.confirmingUserDeletion = false

                this.form.reset()
            },
        },
    })
</script>
