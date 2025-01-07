export const taskStatusFormatter = (status: string) => {
  switch (status) {
    case "pending":
      return "Pendente";
    case "in_progress":
      return "Em progresso";
    case "completed":
      return "Completo";
    default:
      return status;
  }
};
