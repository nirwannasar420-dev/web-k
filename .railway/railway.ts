import { defineRailway, github, preserve, project, service } from "railway/iac";

// Last resort for a per-service CaC repo. Prefer one .railway file for the
// project and drop this if you later combine services into that file.
export const partial = "web-k";

export default defineRailway(() => {
  const web_k = service("web-k", {
    source: github("nirwannasar420-dev/web-k", {
      branch: "main",
    }),
    build: {
      builder: "DOCKERFILE",
      dockerfilePath: "Dockerfile",
    },
    healthcheck: "/login",
    healthcheckTimeout: 300,
    env: {
      APP_DEBUG: preserve(),
      APP_ENV: preserve(),
      APP_KEY: preserve(),
      APP_NAME: preserve(),
      APP_URL: preserve(),
      CACHE_STORE: preserve(),
      DB_CONNECTION: preserve(),
      DB_URL: preserve(),
      LOG_CHANNEL: preserve(),
      LOG_LEVEL: preserve(),
      QUEUE_CONNECTION: preserve(),
      SESSION_DRIVER: preserve(),
    },
  });
  return project("web-k", {
    resources: [web_k],
  });
});
