FROM node:alpine

WORKDIR /app

RUN npm install -g @vue/cli
COPY ./package.json ./
RUN npm install --force
COPY . .

CMD ["npm", "run", "serve"]