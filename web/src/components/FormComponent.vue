<template>
  <div class="q-pa-xl">
    <q-card>
      <q-card-section class="q-pa-md">
        <q-form
          @submit="onSubmit"
          class="flex column items-center justify-center"
        >
          <q-input
            filled
            v-model="title"
            label="Título"
            lazy-rules
            class="full-width"
            :rules="[
              (val) => (val && val.length > 0) || 'Please type something',
            ]"
          />

          <q-input
            filled
            v-model="description"
            label="Descrição"
            lazy-rules
            class="full-width q-pt-sm"
            :rules="[
              (val) => (val && val.length > 0) || 'Please type something',
            ]"
          />

          <q-select
            filled
            v-model="category_id"
            :options="categories"
            option-label="name"
            option-value="id"
            label="Selecione a categoria"
            lazy-rules
            class="full-width q-pt-sm"
            :rules="[(val) => !!val || 'Category is required']"
          />

          <q-btn
            label="Enviar"
            type="submit"
            color="primary"
            class="full-width q-mt-sm"
          />
        </q-form>
      </q-card-section>
    </q-card>
  </div>
</template>

<script>
import { useQuasar } from "quasar";
import { createTask } from "src/api/createTask";
import { ref } from "vue";

export default {
  setup() {
    const $q = useQuasar();
    const title = ref(null);
    const description = ref(null);
    const category_id = ref(null);

    const categories = [
      { id: 1, name: "Pessoal" },
      { id: 2, name: "Trabalho" },
      { id: 3, name: "Estudos" },
      { id: 4, name: "Saúde" },
      { id: 5, name: "Compras" },
      { id: 6, name: "Projetos" },
      { id: 7, name: "Finanças" },
      { id: 8, name: "Casa" },
      { id: 9, name: "Entretenimento" },
      { id: 10, name: "Social" },
      { id: 11, name: "Viajar" },
      { id: 12, name: "Administração" },
      { id: 13, name: "Voluntariado" },
    ];

    const onSubmit = async () => {
      if (title.value && description.value && category_id.value.id) {
        try {
          await createTask({
            title: title.value,
            description: description.value,
            category_id: category_id.value.id,
          });

          $q.notify({
            color: "green-4",
            message: "Task successfully created!",
            position: "top",
            timeout: 2000,
          });

          title.value = null;
          description.value = null;
          category_id.value = null;

          window.location.reload();
        } catch (error) {
          $q.notify({
            color: "red-5",
            message: "Unable to create task due to a server error",
            position: top,
            timeout: 2000,
          });
        }
      } else {
        $q.notify({
          color: "red-5",
          message: "Please fill in all fields before submitting.",
          position: "top",
          timeout: 2000,
        });
      }
    };

    return {
      title,
      description,
      category_id,
      categories,
      onSubmit,
    };
  },
};
</script>
