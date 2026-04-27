import e from "express";
import dotenv from "dotenv";
dotenv.config({
  path: "./.env",
});
const app = e();
const PORT = process.env.PORT;
app.use(e.json());

app.listen(PORT, () => console.log(`http://localhost:${PORT}`));
