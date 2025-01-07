<template>
  <q-dialog v-model="internalShow">
    <q-card class="card-width">
      <q-card-section>
        <div class="text-h6">Editar Tarefa</div>
      </q-card-section>

      <q-card-section>
        <q-input v-model="taskCopy.title" label="Título" autofocus />
        <q-input
          v-model="taskCopy.description"
          label="Descrição"
          type="textarea"
        />
        <q-select
          v-model="taskCopy.status"
          :options="statusOptions"
          option-label="label"
          option-value="value"
          label="Status"
          emit-value
          map-options
          borderless
        />
      </q-card-section>

      <q-card-actions class="q-mt-none q-ml-auto q-gutter-xs flex justify-end">
        <q-btn label="Cancelar" @click="closeModal" color="secondary" />
        <q-btn label="Salvar" @click="handleUpdate" color="primary" />
      </q-card-actions>
    </q-card>
  </q-dialog>
</template>

<script setup>
import { ref, watch } from "vue";

const props = defineProps({
  show: { type: Boolean, required: true },
  task: { type: Object, required: true },
});

const emit = defineEmits(["update:show", "update"]);
const internalShow = ref(props.show);
const taskCopy = ref({});

const statusOptions = [
  { value: "pending", label: "Pendente" },
  { value: "in_progress", label: "Em andamento" },
  { value: "completed", label: "Concluída" },
];

watch(
  () => props.task,
  (newTask) => {
    taskCopy.value = { ...newTask };
  },
  { immediate: true }
);

watch(
  () => props.show,
  (newVal) => {
    internalShow.value = newVal;
  }
);

const closeModal = () => {
  emit("update:show", false);
};

const handleUpdate = async () => {
  emit("update", { ...taskCopy.value });
  closeModal();
};
</script>

<style scoped>
.card-width {
  width: 80vw;
  max-width: 1000px;
}
</style>
