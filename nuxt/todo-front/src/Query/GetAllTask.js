class GetAllTask {
  constructor (module) {
    this.module = module;
  }
  async process() {
    return await fetch("http://localhost:8081/api/task", {cache: "reload"});
  }
}

export default GetAllTask;
