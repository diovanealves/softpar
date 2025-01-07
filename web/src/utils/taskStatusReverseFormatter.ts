export const taskStatusReverseFormatter = (status: string) => {
  switch (status) {
    case "Pendente":
      return "pending";
    case "Em progresso":
      return "in_progress";
    case "Completo":
      return "completed";
    default:
      return status;
  }
};
