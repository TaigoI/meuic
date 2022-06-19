--
-- PostgreSQL database dump
--

-- Dumped from database version 12.11 (Ubuntu 12.11-0ubuntu0.20.04.1)
-- Dumped by pg_dump version 12.11 (Ubuntu 12.11-0ubuntu0.20.04.1)

-- Started on 2022-06-08 22:59:37 -03

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3005 (class 1262 OID 18922)
-- Name: meu_ic; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE meu_ic WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'pt_BR.UTF-8' LC_CTYPE = 'pt_BR.UTF-8';


ALTER DATABASE meu_ic OWNER TO postgres;

\connect meu_ic

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 207 (class 1259 OID 18957)
-- Name: disciplinas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.disciplinas (
    "id_disciplina" character varying(255) NOT NULL,
    "name_disciplina" character varying(255) NOT NULL
);


ALTER TABLE public.disciplinas OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 18925)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 18923)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 3006 (class 0 OID 0)
-- Dependencies: 202
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 209 (class 1259 OID 18975)
-- Name: modulos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.modulos (
    "id_modulo" bigint NOT NULL,
    modulo character varying(255) NOT NULL,
    "id_disciplina" character varying(255) NOT NULL
);


ALTER TABLE public.modulos OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 18973)
-- Name: modulos_id_modulo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."modulos_id_modulo_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."modulos_id_modulo_seq" OWNER TO postgres;

--
-- TOC entry 3007 (class 0 OID 0)
-- Dependencies: 208
-- Name: modulos_id_modulo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."modulos_id_modulo_seq" OWNED BY public.modulos."id_modulo";


--
-- TOC entry 204 (class 1259 OID 18931)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    "ID" character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    matricula character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    picture character varying(255) NOT NULL,
    "user_role" character varying(255) NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 2853 (class 2604 OID 18928)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 2854 (class 2604 OID 18978)
-- Name: modulos id_modulo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modulos ALTER COLUMN "id_modulo" SET DEFAULT nextval('public."modulos_id_modulo_seq"'::regclass);


--
-- TOC entry 2997 (class 0 OID 18957)
-- Dependencies: 207
-- Data for Name: disciplinas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.disciplinas ("id_disciplina", "name_disciplina") FROM stdin;
COMP360	LÓGICA PARA COMPUTAÇÃO
COMP361	COMPUTAÇÃO, SOCIEDADE E ÉTICA
COMP362	MATEMÁTICA DISCRETA
COMP363	CÁLCULO DIFERENCIAL E INTEGRAL
COMP364	ESTRUTURA DE DADOS
COMP365	BANCO DE DADOS
COMP366	ORGANIZAÇÃO E ARQUITETURA DE COMPUTADORES
COMP367	GEOMETRIA ANALÍTICA
COMP368	REDES DE COMPUTADORES
COMP369	TEORIA DOS GRAFOS
COMP370	PROBABILIDADE E ESTATÍSTICA
COMP371	ÁLGEBRA LINEAR
COMP372	PROGRAMAÇÃO 2
COMP373	PROGRAMAÇÃO 3
COMP374	PROJETO E ANÁLISE DE ALGORITMOS
COMP376	TEORIA DA COMPUTAÇÃO
COMP378	SISTEMAS OPERACIONAIS
COMP379	COMPILADORES
COMP380	INTELIGÊNCIA ARTIFICIAL
COMP381	COMPUTAÇÃO GRÁFICA
COMP382	PROJETO E DESENVOLVIMENTO DE SISTEMAS
COMP386	METODOLOGIA DE PESQUISA E TRABALHO INDIVIDUAL
COMP387	NOÇÕES DE DIREITO
COMP404	CÁLCULO 3
COMP389	CONCEITOS DE LINGUAGEM DE PROGRAMAÇÃO
COMP390	APRENDIZAGEM DE MÁQUINA
COMP391	SISTEMAS DIGITAIS
COMP392	SISTEMAS DISTRIBUÍDOS
COMP393	REDES NEURAIS E APRENDIZADO PROFUNDO
COMP394	FPGA
COMP395	INTERAÇÃO HOMEM-MÁQUINA
COMP396	PROCESSAMENTO DIGITAL DE IMAGENS
COMP397	COMPUTAÇÃO EVOLUCIONÁRIA
COMP398	SISTEMAS EMBARCADOS
COMP399	GERÊNCIA DE PROJETO
COMP400	VISÃO COMPUTACIONAL
COMP401	CIÊNCIA DE DADOS
COMP402	MICROCONTROLADORE S E APLICAÇÕES
COMP403	SEGURANÇA DE SISTEMAS COMPUTACIONAIS
CC1941	CÁLCULO 4
CC1942	CÁLCULO NUMÉRICO
CC1943	CIRCUITOS DIGITAIS
CC1944	CIRCUITOS IMPRESSOS
CC1945	FUNDAMENTOS DE LIBRAS
CC1946	GEOMETRIA COMPUTACIONAL
CC1947	PESQUISA OPERACIONAL
CC1948	PROGRAMAÇÃO PARA SISTEMAS EMBARCADOS
CC1949	PROJETO DE SISTEMAS EMBARCADOS
CC1950	TÓPICOS EM ARQUITETURA DE COMPUTADORES
CC1951	TÓPICOS EM BANCO DE DADOS
CC1952	TÓPICOS EM COMPUTAÇÃO CIENTÍFICA
CC1953	TÓPICOS EM COMPUTAÇÃO PARALELA
CC1954	TÓPICOS EM COMPUTAÇÃO VISUAL
CC1955	TÓPICOS EM COMUNICAÇÃO DE DADOS
CC1956	TÓPICOS EM DESENVOLVIMENTO DE SISTEMAS
CC1957	TÓPICOS EM ENGENHARIA DE SOFTWARE
CC1958	TÓPICOS EM HUMANIDADES
CC1959	TÓPICOS EM INFORMÁTICA NA EDUCAÇÃO
CC1960	TÓPICOS EM INTELIGÊNCIA ARTIFICIAL
CC1961	TÓPICOS EM LINGUAGENS DE PROGRAMAÇÃO
CC1962	TÓPICOS EM PROGRAMAÇÃO
CC1963	TÓPICOS EM REDES DE COMPUTADORES
CC1964	TÓPICOS EM SISTEMAS DE COMPUTAÇÃO
CC1965	TÓPICOS EM SISTEMAS DE INFORMAÇÃO
CC1966	TÓPICOS EM SISTEMAS DISTRIBUÍDOS
CC1967	TÓPICOS EM SISTEMAS INTELIGENTES
CC1968	TÓPICOS EM SOFTWARE BÁSICO
COMP405	TÓPICOS EM CIÊNCIA DA COMPUTAÇÃO 1
COMP406	TÓPICOS EM CIÊNCIA DA COMPUTAÇÃO 2
COMP407	TÓPICOS EM CIÊNCIA DA COMPUTAÇÃO 3
COMP409	TÓPICOS EM MATEMÁTICA PARA COMPUTAÇÃO 1
COMP410	TÓPICOS EM MATEMÁTICA PARA COMPUTAÇÃO 2
COMP411	TÓPICOS EM MATEMÁTICA PARA COMPUTAÇÃO 3
COMP412	TÓPICOS EM FÍSICA PARA COMPUTAÇÃO 1
COMP413	TÓPICOS EM FÍSICA PARA COMPUTAÇÃO 2
COMP414	TÓPICOS EM FÍSICA PARA COMPUTAÇÃO 3
\.


--
-- TOC entry 2995 (class 0 OID 18925)
-- Dependencies: 203
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2019_12_14_000001_create_personal_access_tokens_table	1
3	2022_06_07_003923_create_disciplinas_table	1
4	2022_06_07_003931_create_modulos_table	2
\.


--
-- TOC entry 2999 (class 0 OID 18975)
-- Dependencies: 209
-- Data for Name: modulos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.modulos ("id_modulo", modulo, "id_disciplina") FROM stdin;
156	1º PERIODO	COMP360
157	1º PERIODO	COMP361
158	1º PERIODO	COMP362
159	1º PERIODO	COMP363
160	2º PERIODO	COMP364
161	2º PERIODO	COMP365
162	2º PERIODO	COMP366
163	2º PERIODO	COMP367
164	3º PERIODO	COMP368
165	3º PERIODO	COMP369
166	3º PERIODO	COMP370
167	3º PERIODO	COMP371
168	4º PERIODO	COMP372
169	4º PERIODO	COMP373
170	4º PERIODO	COMP374
171	4º PERIODO	COMP376
172	5º PERIODO	COMP378
173	5º PERIODO	COMP379
174	5º PERIODO	COMP380
175	5º PERIODO	COMP381
176	6º PERIODO	COMP382
177	7º PERIODO	COMP386
178	7º PERIODO	COMP387
179	COMPUTAÇÃO VISUAL	COMP404
180	SISTEMAS DE INFORMAÇÃO	COMP389
181	COMPUTAÇÃO VISUAL	COMP390
182	SISTEMAS DE COMPUTAÇÃO	COMP391
183	SISTEMAS DE INFORMAÇÃO	COMP392
184	COMPUTAÇÃO VISUAL	COMP393
185	SISTEMAS DE COMPUTAÇÃO	COMP394
186	SISTEMAS DE INFORMAÇÃO	COMP395
187	COMPUTAÇÃO VISUAL	COMP396
188	SISTEMAS INTELIGENTES	COMP397
189	SISTEMAS DE COMPUTAÇÃO	COMP398
190	SISTEMAS DE INFORMAÇÃO	COMP399
191	COMPUTAÇÃO VISUAL	COMP400
192	SISTEMAS INTELIGENTES	COMP401
193	SISTEMAS DE COMPUTAÇÃO	COMP402
194	SISTEMAS DE INFORMAÇÃO	COMP403
195	ELETIVAS	CC1941
196	ELETIVAS	CC1942
197	ELETIVAS	CC1943
198	ELETIVAS	CC1944
199	ELETIVAS	CC1945
200	ELETIVAS	CC1946
201	ELETIVAS	CC1947
202	ELETIVAS	CC1948
203	ELETIVAS	CC1949
204	ELETIVAS	CC1950
205	ELETIVAS	CC1951
206	ELETIVAS	CC1952
207	ELETIVAS	CC1953
208	ELETIVAS	CC1954
209	ELETIVAS	CC1955
210	ELETIVAS	CC1956
211	ELETIVAS	CC1957
212	ELETIVAS	CC1958
213	ELETIVAS	CC1959
214	ELETIVAS	CC1960
215	ELETIVAS	CC1961
216	ELETIVAS	CC1962
217	ELETIVAS	CC1963
218	ELETIVAS	CC1964
219	ELETIVAS	CC1965
220	ELETIVAS	CC1966
221	ELETIVAS	CC1967
222	ELETIVAS	CC1968
223	ELETIVAS	COMP405
224	ELETIVAS	COMP406
225	ELETIVAS	COMP407
226	ELETIVAS	COMP409
227	ELETIVAS	COMP410
228	ELETIVAS	COMP411
229	ELETIVAS	COMP412
230	ELETIVAS	COMP413
231	ELETIVAS	COMP414
\.


--
-- TOC entry 2996 (class 0 OID 18931)
-- Dependencies: 204
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users ("ID", email, matricula, name, picture, "user_role") FROM stdin;
\.


--
-- TOC entry 3008 (class 0 OID 0)
-- Dependencies: 202
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 4, true);


--
-- TOC entry 3009 (class 0 OID 0)
-- Dependencies: 208
-- Name: modulos_id_modulo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."modulos_id_modulo_seq"', 1, false);


--
-- TOC entry 2864 (class 2606 OID 18964)
-- Name: disciplinas disciplinas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.disciplinas
    ADD CONSTRAINT disciplinas_pkey PRIMARY KEY ("id_disciplina");


--
-- TOC entry 2856 (class 2606 OID 18930)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 2866 (class 2606 OID 18983)
-- Name: modulos modulos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modulos
    ADD CONSTRAINT modulos_pkey PRIMARY KEY ("id_modulo");


--
-- TOC entry 2858 (class 2606 OID 18940)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 2860 (class 2606 OID 18942)
-- Name: users users_matricula_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_matricula_unique UNIQUE (matricula);


--
-- TOC entry 2862 (class 2606 OID 18938)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY ("ID");


--
-- TOC entry 2867 (class 2606 OID 18984)
-- Name: modulos modulos_id_disciplina_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modulos
    ADD CONSTRAINT modulos_id_disciplina_foreign FOREIGN KEY ("id_disciplina") REFERENCES public.disciplinas("id_disciplina");


-- Completed on 2022-06-08 22:59:37 -03

--
-- PostgreSQL database dump complete
--

