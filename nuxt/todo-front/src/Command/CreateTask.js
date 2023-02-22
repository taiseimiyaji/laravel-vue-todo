import axios from 'axios'

class CreateTask {
  async process(task) {
    const data = new FormData();
    data.append('name', task.name);
    data.append('cost', task.cost);
    data.append('deadline', this.getNowDateWithString(task.deadline));
    data.append('detail', task.detail);
    data.append('statusId', task.statusId);
    data.append('sort', task.sort);
    return await axios.post("http://localhost:8081/api/task", data);
  }
  getNowDateWithString(dt){
    const y = dt.getFullYear();
    const m = ("00" + (dt.getMonth()+1)).slice(-2);
    const d = ("00" + dt.getDate()).slice(-2);
    return y + "-" + m + "-" + d;
  }
}
export default CreateTask;
