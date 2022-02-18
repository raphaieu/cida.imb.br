<template>
    <Head title="Confirmação de Dois Fatores" />
    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>
        <div class="mb-4 text-sm text-gray-600">
            <template v-if="! recovery">
                Confirme o acesso à sua conta digitando o código de autenticação fornecido pelo seu aplicativo autenticador.
            </template>
            <template v-else>
                Confirme o acesso à sua conta digitando um dos seus códigos de recuperação de emergência.
            </template>
        </div>
        <jet-validation-errors class="mb-4" />
        <form @submit.prevent="submit">
            <div v-if="! recovery">
                <jet-label for="code" value="Código" />
                <jet-input ref="code" id="code" type="text" inputmode="numeric" class="block w-full mt-1" v-model="form.code" autofocus autocomplete="one-time-code" />
            </div>
            <div v-else>
                <jet-label for="recovery_code" value="Código de Recuperação" />
                <jet-input ref="recovery_code" id="recovery_code" type="text" class="block w-full mt-1" v-model="form.recovery_code" autocomplete="one-time-code" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <button type="button" class="text-sm text-gray-600 underline cursor-pointer hover:text-gray-900" @click.prevent="toggleRecovery">
                    <template v-if="! recovery">
                        Use o código de recuperação
                    </template>
                    <template v-else>
                        Use o código de autenticação
                    </template>
                </button>
                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Entrar
                </jet-button>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
    import { defineComponent } from 'vue';
    import { Head } from '@inertiajs/inertia-vue3';
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'

    export default defineComponent({
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors,
        },

        data() {
            return {
                recovery: false,
                form: this.$inertia.form({
                    code: '',
                    recovery_code: '',
                })
            }
        },

        methods: {
            toggleRecovery() {
                this.recovery ^= true

                this.$nextTick(() => {
                    if (this.recovery) {
                        this.$refs.recovery_code.focus()
                        this.form.code = '';
                    } else {
                        this.$refs.code.focus()
                        this.form.recovery_code = ''
                    }
                })
            },

            submit() {
                this.form.post(this.route('two-factor.login'))
            }
        }
    })
</script>
