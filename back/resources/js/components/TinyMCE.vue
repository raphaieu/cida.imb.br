<template>
    <editor
        api-key="bt0lhnsdc1l2l1rg6k1tvhy8kd1bndtg1yn65bolubqsegn6"
        v-model="description"
        :init="{
            height: 400,
            plugins: 'table lists paste',
            toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table',
        }"
    />
    <input type="hidden" name="description" :value="description">
</template>

<script>
import { ref } from 'vue';
import Editor from '@tinymce/tinymce-vue';

export default {
    components: {
        Editor,
    },
    props: {
        initialValue: {
            type: String,
            default: '',
        },
    },
    setup(props) {
        const description = ref(props.initialValue);
        return {
            description,
        };
    },
};
</script>
