import { api } from "src/boot/axios";

export const deleteTask = async (id: number) => {
  try {
    const taskResponse = await api.delete(`/task/${id}`);

    return taskResponse.status;
  } catch (error) {
    throw new Error("Unable to delete task due to a server error");
  }
};
