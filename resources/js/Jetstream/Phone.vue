<template>
    <input
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        @focus="focus"
        ref="phone"
        class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
    />
</template>

<script>
import { defineComponent } from 'vue'
const VMasker = require('vanilla-masker');

export default defineComponent({
    components: {
        
    },

    props: ['modelValue'],

    emits: ['update:modelValue'],

    setup() {
        
    },

    methods: {
        focus() {
            VMasker(this.$refs.phone).maskPattern("(99) 9 9999-9999");
            this.$refs.phone.focus();
        }
    }
})
</script>
