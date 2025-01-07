<template>
  <div class="q-pa-xl">
    <q-card>
      <q-card-section>
        <q-table
          :rows="tasks"
          :columns="columns"
          row-key="id"
          :loading="isLoading"
        >
          <template v-slot:body-cell-action="props">
            <q-td :props="props">
              <q-btn
                icon="edit"
                color="primary"
                @click="openModal(props.row)"
                rounded
                dense
                class="q-mr-sm"
              />

              <q-btn
                color="negative"
                icon="delete"
                @click="removeTask(props.row.id)"
                rounded
                dense
                class="q-mr-sm"
              />
            </q-td>
          </template>
        </q-table>

        <UpdateTaskModalComponent
          :show="showModal"
          :task="selectedTask || {}"
          @update="handleUpdate"
          @update:show="(value) => (showModal = value)"
        />
      </q-card-section>
    </q-card>
  </div>
</template>

<script setup>
import { useQuasar } from "quasar";
import { deleteTask } from "src/api/deleteTask";
import { getTasks } from "src/api/getTasks";
import { updateTask } from "src/api/updateTask";
import { taskStatusReverseFormatter } from "src/utils/taskStatusReverseFormatter";
import { onMounted, ref } from "vue";
import UpdateTaskModalComponent from "./UpdateTaskModalComponent.vue";

const $q = useQuasar();
const tasks = ref([]);
const isLoading = ref(false);

const columns = [
  { name: "id", label: "ID", align: "center", field: (row) => row.id },
  { name: "title", label: "Título", align: "left", field: (row) => row.title },
  {
    name: "description",
    label: "Descrição",
    align: "left",
    field: (row) => row.description,
  },
  {
    name: "status",
    label: "Status",
    align: "center",
    field: (row) => row.status,
  },
  {
    name: "concluded_at",
    label: "Concluída em",
    align: "center",
    field: (row) => row.concluded_at || "-",
  },
  {
    name: "created_at",
    label: "Criada em",
    align: "center",
    field: (row) => row.created_at,
  },
  { name: "action", label: "Ação", align: "center", field: "action" },
];

const fetchTasks = async () => {
  try {
    isLoading.value = true;
    const response = await getTasks({ order: "desc" });

    tasks.value = response;
  } catch (error) {
    $q.notify({
      color: "red-5",
      message: "Unable to get task due to a server error",
      position: top,
      timeout: 2000,
    });
  } finally {
    isLoading.value = false;
  }
};
onMounted(fetchTasks);

const showModal = ref(false);
const selectedTask = ref(null);

const openModal = (task) => {
  selectedTask.value = task;
  showModal.value = true;
};

const handleUpdate = async (updatedTask) => {
  try {
    await updateTask({
      id: updatedTask.id,
      title: updatedTask.title,
      description: updatedTask.description,
      status: taskStatusReverseFormatter(updatedTask.status),
    });

    window.location.reload();
  } catch (error) {
    $q.notify({
      color: "red-5",
      message: "Unable to update task due to a server error",
      position: top,
      timeout: 2000,
    });
  }
};

const removeTask = async (id) => {
  try {
    await deleteTask(id);

    window.location.reload();
  } catch (error) {
    $q.notify({
      color: "red-5",
      message: "Unable to remove task due to a server error",
      position: top,
      timeout: 2000,
    });
  }
};
</script>
