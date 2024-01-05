import { Client, Account } from "appwrite";

export const client = new Client();

client
  .setEndpoint("https://cloud.appwrite.io/v1")
  .setProject("655a3d09af986584f80b");

export const account = new Account(client);
export { ID } from "appwrite";
