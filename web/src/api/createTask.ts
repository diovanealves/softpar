import { api } from "src/boot/axios";

export interface CreateTaskSchema {
  title: string;
  description: string | null;
  category_id: number;
}

export const createTask = async (taskData: CreateTaskSchema) => {
  try {
    const taskResponse = await api.post("/task", {
      title: taskData.title,
      description: taskData.description || "",
      category_id: taskData.category_id,
    });
    return taskResponse.data;
  } catch (error) {
    throw new Error("Unable to create task due to a server error");
  }
};
