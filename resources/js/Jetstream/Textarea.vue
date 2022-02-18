<template>
    <textarea :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="textarea" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: ['modelValue'],

        emits: ['update:modelValue'],

        methods: {
            focus() {
                this.$refs.textarea.focus()
            }
        }
    })
</script>
