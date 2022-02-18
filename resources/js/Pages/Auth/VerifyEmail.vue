<template>
    <Head title="Verificação de E-mail" />
    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>
        <div class="mb-4 text-sm text-gray-600">
            Obrigado por inscrever-se! Antes de começar, você poderia verificar seu endereço de e-mail clicando no link que acabamos de enviar para você? Se você não recebeu o e-mail, teremos o prazer de lhe enviar outro.
        </div>
        <div class="mb-4 text-sm font-medium text-green-600" v-if="verificationLinkSent" >
            Um novo link de verificação foi enviado para o endereço de e-mail fornecido durante o registro.
        </div>
        <form @submit.prevent="submit">
            <div class="flex items-center justify-between mt-4">
                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Re-enviar e-mail
                </jet-button>
                <Link :href="route('logout')" method="post" as="button" class="text-sm text-gray-600 underline hover:text-gray-900">Sair</Link>
            </div>
        </form>
    </jet-authentication-card>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            Link,
        },

        props: {
            status: String
        },

        data() {
            return {
                form: this.$inertia.form()
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('verification.send'))
            },
        },

        computed: {
            verificationLinkSent() {
                return this.status === 'verification-link-sent';
            }
        }
    })
</script>
