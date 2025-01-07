<template>
  <FormComponent />
  <TaskComponent />
</template>

<script lang="ts">
import FormComponent from "src/components/FormComponent.vue";
import TaskComponent from "src/components/TaskComponent.vue";
import { defineComponent } from "vue";

export default defineComponent({
  name: "IndexPage",

  components: {
    FormComponent,
    TaskComponent,
  },
});
</script>
