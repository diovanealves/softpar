import { api } from "src/boot/axios";
import { taskDateFormatter } from "src/utils/taskDateFormatter";
import { taskStatusFormatter } from "src/utils/taskStatusFormatter";

export interface Task {
  id: number;
  title: string;
  description: string;
  status: string;
  created_at: string;
  concluded_at: string;
  category: {
    id: number;
    name: string;
    created_at: string;
  };
}

export interface GetTaskSchema {
  order: "desc" | "asc";
}

export const getTasks = async ({ order }: GetTaskSchema) => {
  try {
    const tasksResponse = await api.get(`/task?order=${order}`);

    const tasksWithFormattedDates = tasksResponse.data.data.map(
      (task: Task) => {
        return {
          ...task,
          status: taskStatusFormatter(task.status),
          created_at: task.created_at
            ? taskDateFormatter(task.created_at)
            : null,
          concluded_at: task.concluded_at
            ? taskDateFormatter(task.concluded_at)
            : null,
        };
      }
    );

    return tasksWithFormattedDates;
  } catch (error) {
    throw new Error("Unable to get tasks due to a server error");
  }
};
