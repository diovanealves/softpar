import { api } from "src/boot/axios";

export interface UpdateTaskSchema {
  id: number;
  title: string;
  description: string;
  status: "pending" | "in_progress" | "completed";
}

export const updateTask = async (taskData: UpdateTaskSchema) => {
  try {
    await api.patch(`/task/${taskData.id}`, {
      title: taskData.title,
      description: taskData.description,
      status: taskData.status,
    });

    return true;
  } catch (error) {
    throw new Error("Unable to update tasks due to a server error");
  }
};
