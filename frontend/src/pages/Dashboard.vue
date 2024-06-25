<template>
  <base-layout titlecard="Home">

    <v-container>



        <v-card
          class="mx-auto my-2 "
          elevation="8"
        >
          <v-card-item >
            <v-card-title >
              <h1 class="title text-center p-0 m-0">Seja bem-vindo ao teste de desenvolvimento</h1>
            </v-card-title>
          </v-card-item>
          <hr>
          <v-card-item>
            <v-row class="justify-content-center shadow rounded-3">

              <v-col class="col-6 col-sm-6 col-md-5 col-lg-4 col-xl-4 col-xxl-3 align-self-center">
                <v-img src="@/assets/img/italo-rodrigo.jpg" class="img-fluid rounded-circle mb-3 photo">
                </v-img>
              </v-col>
              <v-col md="8">
                <v-sheet>
                  <h2 class="text-center subtitle">Apresentação</h2>
                  <p class="mb-1"><strong>Nome:</strong> Ítalo Rodrigo Soares Silva</p>
                  <p class="mb-1"><strong>Cargo:</strong> Desenvolvedor Fullstack</p>
                  <p class="custom-justified">
                    <strong>Resumo Profissional:</strong>
                    Atua há mais de 5 anos como desenvolvedor fullstack, adquiriu experiência ao trabalhar com ferramentas
                    das stacks de programação back-end e front-end, ao longo dos anos conquistou maturidade em análises de
                    processos para abstração de regras de negócios aplicadas à sistemas web e mobile. Desenvolveu habilidades
                    no âmbito da Segurança da Informação aplicado à penetração de dados, segurança de redes e planos de segurança
                    da informação, no âmbito da Ciência de Dados aplicado à sistemasde predição com DNN, RNA, e Algoritmos de Otimização.
                  </p>
                  <p class="custom-justified">Trabalhei em desenvolvimento de web sites e sistemas computacionais atuando no
                    back e no front das aplicações, implementação e desenvolvimento de técnicas computacionais para otimização de processos.
                    Trabalhei com as seguintes ferramentas e tecnologias: HTML, CSS, Bootstrap 5, Vue.js, Vuetify, Javascript, Node.js,
                    Java, Git, GitHub, Figma, Pré Processadores CSS (SCSS), SCRUM. Participando de todas as fases de desenvolvimento,
                    indo desde o levantamento de requisitos junto ao cliente e
                    modelagem de layouts até a implementação, testes e entrega do sistema, utilizando a metodologia ágil
                    SCRUM. Os Projetos são relacionados a monitoramento em tempo real, processos produtivos, gestão e
                    área administrativa. Também sou pesquisador na área de otimização de processos e computação aplicada, com alguns artigos e
                    capítulos de livros publicados em periódicos internacionais. Professor de cursos de curta duração em Segurança da Informação e
                    exporadicamente participo de elaboração de propostas de projetos de inovação na área de engenharia junto ao
                    desenvolvimento de software.</p>
                  <h3 class="text-center mt-5 subtitle">Formação Acadêmica</h3>
                  <v-list lines="one">
                    <v-list-item>
                      Mestrado em Engenharia, Gestão de Processos, Sistema e Ambiental (EGPSA)
                    </v-list-item>

                    <v-list-item>
                      Bacharelado em Ciência da Computação
                    </v-list-item>
                  </v-list>
                </v-sheet>
              </v-col>
            </v-row>
          </v-card-item>
        </v-card>



      <!-- <v-card>
        <v-card-item>
          <v-row>
            <v-col cols="12" class="text-center">
              <h1 class="title">Seja bem-vindo ao teste de desenvolvimento</h1>
            </v-col>
          </v-row>
        </v-card-item>

        <v-card-item>
          <v-row class="mt-3 justify-content-center border shadow rounded-3 p-2 fundo">
            <v-col class="col-6 col-sm-6 col-md-5 col-lg-4 col-xl-4 col-xxl-3 align-self-center">
              <v-img src="@/assets/img/italo-rodrigo.jpg" class="img-fluid rounded-circle mb-3 photo">
              </v-img>
            </v-col>
            <v-col md="8">
              <v-sheet class="pa-2 ma-2">
                <h2 class="text-center subtitle">Apresentação</h2>
                <p><strong>Nome:</strong> Ítalo Rodrigo Soares Silva</p>
                <p><strong>Cargo:</strong> Desenvolvedor Fullstack</p>
                <p class="custom-justified"><strong>Resumo Profissional:</strong> Sou um desenvolvedor front-end apaixonado e
                  experiente, com
                  mais de cinco anos de atuação na área. Ao longo da minha carreira, desenvolvi alguns softwares em
                  Projetos de Desenvolvimento e Inovação (PD&I), atuando desde o levantamento de requisitos até a
                  entrega do software junto ao cliente.</p>
                <p class="custom-justified">Trabalhei em desenvolvimento de web sites e sistemas computacionais atuando no
                  FrontEnd das aplicações,
                  implementação e desenvolvimento de técnicas computacionais para otimização de processos. Trabalhando
                  com as seguintes ferramentas e tecnologias: HTML, CSS, Bootstrap 5, Vue.js, Javascript, Node.js,
                  Java, Vuetify, Git, GitHub, Figma, Pré Processadores CSS (SCSS), SCRUM, Jest, Cypress. Participando
                  de todas as fases de desenvolvimento, indo desde o levantamento de requisitos junto ao cliente e
                  modelagem de layouts até a implementação, testes e entrega do sistema, utilizando a metodologia ágil
                  SCRUM. Os Projetos são relacionados a monitoramento em tempo real, processos produtivos, gestão e
                  área administrativa. Também sou pesquisador na área de otimização de processos, com alguns artigos e
                  capítulos
                  de livros publicados em periódicos internacionais. Professor de cursos de curta duração em Power BI e
                  exporadicamente participo de elaboração de propostas de projetos de inovação na área de engenharia junto ao
                  desenvolvimento de software.</p>
                <h3 class="text-center mt-5 subtitle">Formação Acadêmica</h3>
                <v-list lines="one">
                  <v-list-item>
                    Mestrado em Engenharia, Gestão de Processos, Sistema e Ambiental (EGPSA)
                  </v-list-item>

                  <v-list-item>
                    Bacharelado em Ciência da Computação
                  </v-list-item>
                </v-list>
              </v-sheet>
            </v-col>
          </v-row>
        </v-card-item>

      </v-card> -->
    </v-container>


  </base-layout>
</template>

<script>
import BaseLayout from '../layouts/BaseLayout.vue'
export default {
  components: { BaseLayout },
  name: "Dashboard",
  data() {
    return {
      // counter: this.$auth.getCounter
    }
  }
}
</script>

