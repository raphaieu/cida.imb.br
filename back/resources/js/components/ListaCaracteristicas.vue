<script setup>
import {defineProps, ref, watch} from 'vue';
import axios from 'axios';

const props = defineProps({
    characteristics: Array,
    characteristicsType: String
});

const localCharacteristics = ref([...props.characteristics]);

watch(() => props.characteristics, (newVal) => {
    localCharacteristics.value = [...newVal];
});

function addItem() {
    const nextId = localCharacteristics.value.length + 1;
    localCharacteristics.value.push({ c_id: nextId, c_nome: 'Nova Característica', c_action: 'new', c_tipo: props.characteristicsType });
}

async function updateItem(item, event) {
    if (event.target.innerText === '') {
        await deleteItem(item.c_id);
        return ;
    }

    if (item.c_action !== undefined && item.c_action === 'new') {
        try {
            const response = await axios.post('/caracteristicas/imovel/novo', item);
            console.log(response.data); // Trate a resposta conforme necessário
        } catch (error) {
            console.error('Erro ao adicionar item:', error);
        }
        return ;
    }

    item.c_nome = event.target.innerText;

    console.log('Item atualizado', item);
}

async function deleteItem(id) {
    try {
        const response = await axios.delete('/caracteristicas/imovel/excluir/' + id);
        console.log(response.data); // Trate a resposta conforme necessário
        localCharacteristics.value = localCharacteristics.value.filter(item => item.c_id !== id);
    } catch (error) {
        console.error('Erro ao excluir item:', error);
    }
}

</script>
<template>
    <div class="card">
        <div class="card-body">
            <table class="table-auto w-full mt-5">
                <tbody>
                <!-- item -->
                <tr class="" v-for="(item, index) in localCharacteristics" :key="item.c_id">
                    <td class="py-2 text-xs text-gray-600">{{ index +1 }}</td>
                    <td class="py-2 text-sm text-gray-600 flex flex-row items-center text-left cursor-pointer"
                        @blur="updateItem(item, $event)"
                        contenteditable="true"
                    >
                        {{ item.c_nome }}
                    </td>
                </tr>
                <!-- end item -->
                <tr class="">
                    <td class="py-4 text-sm text-gray-600 flex flex-row items-center text-left"></td>
                    <td class="py-4 text-xs text-gray-600"><button class="btn-gray text-sm"  @click="addItem">+</button></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
