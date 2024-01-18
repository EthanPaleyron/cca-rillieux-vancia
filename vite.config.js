import { defineConfig } from "vite";

export default defineConfig({
  build: {
    rollupOptions: {
      input: {
        main: "index.html",
        tarifs_et_horaires: "pages/tarifs-et-horaires.html",
        nos_actualites: "pages/nos-actualites.html",
        histoire_du_club: "pages/histoire-du-club.html",
        equipe: "pages/equipe.html",
        login: "login.html",
      },
    },
  },
});
