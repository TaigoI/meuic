--
-- PostgreSQL database dump
--

-- Dumped from database version 12.11 (Ubuntu 12.11-0ubuntu0.20.04.1)
-- Dumped by pg_dump version 12.11 (Ubuntu 12.11-0ubuntu0.20.04.1)

-- Started on 2022-06-09 09:33:21 -03

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
-- TOC entry 3003 (class 1262 OID 19217)
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

--
-- TOC entry 3 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO postgres;

--
-- TOC entry 3004 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 202 (class 1259 OID 19218)
-- Name: disciplinas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.disciplinas (
    id_disciplina character varying(255) NOT NULL,
    name_disciplina character varying(255) NOT NULL
);


ALTER TABLE public.disciplinas OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 19224)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 19227)
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
-- TOC entry 3005 (class 0 OID 0)
-- Dependencies: 204
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 205 (class 1259 OID 19229)
-- Name: modulos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.modulos (
    id_modulo bigint NOT NULL,
    modulo character varying(255) NOT NULL,
    id_disciplina character varying(255) NOT NULL
);


ALTER TABLE public.modulos OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 19235)
-- Name: modulos_idModulo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."modulos_idModulo_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."modulos_idModulo_seq" OWNER TO postgres;

--
-- TOC entry 3006 (class 0 OID 0)
-- Dependencies: 206
-- Name: modulos_idModulo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."modulos_idModulo_seq" OWNED BY public.modulos.id_modulo;


--
-- TOC entry 207 (class 1259 OID 19237)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    "ID" character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    matricula character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    picture character varying(255) NOT NULL,
    user_role character varying(255) NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 2851 (class 2604 OID 19243)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 2852 (class 2604 OID 19244)
-- Name: modulos id_modulo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modulos ALTER COLUMN id_modulo SET DEFAULT nextval('public."modulos_idModulo_seq"'::regclass);


--
-- TOC entry 2992 (class 0 OID 19218)
-- Dependencies: 202
-- Data for Name: disciplinas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.disciplinas (id_disciplina, name_disciplina) FROM stdin;
COMP360	LÓGICA PARA COMPUTAÇÃO
COMP361	COMPUTAÇÃO
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
-- TOC entry 2993 (class 0 OID 19224)
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
-- TOC entry 2995 (class 0 OID 19229)
-- Dependencies: 205
-- Data for Name: modulos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.modulos (id_modulo, modulo, id_disciplina) FROM stdin;
156	1	COMP360
157	1	COMP361
158	1	COMP362
159	1	COMP363
160	2	COMP364
161	2	COMP365
162	2	COMP366
163	2	COMP367
164	3	COMP368
165	3	COMP369
166	3	COMP370
167	3	COMP371
168	4	COMP372
169	4	COMP373
170	4	COMP374
171	4	COMP376
172	5	COMP378
173	5	COMP379
174	5	COMP380
175	5	COMP381
176	6	COMP382
177	7	COMP386
178	7	COMP387
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
195	ELETIVA	CC1941
196	ELETIVA	CC1942
197	ELETIVA	CC1943
198	ELETIVA	CC1944
199	ELETIVA	CC1945
200	ELETIVA	CC1946
201	ELETIVA	CC1947
202	ELETIVA	CC1948
203	ELETIVA	CC1949
204	ELETIVA	CC1950
205	ELETIVA	CC1951
206	ELETIVA	CC1952
207	ELETIVA	CC1953
208	ELETIVA	CC1954
209	ELETIVA	CC1955
210	ELETIVA	CC1956
211	ELETIVA	CC1957
212	ELETIVA	CC1958
213	ELETIVA	CC1959
214	ELETIVA	CC1960
215	ELETIVA	CC1961
216	ELETIVA	CC1962
217	ELETIVA	CC1963
218	ELETIVA	CC1964
219	ELETIVA	CC1965
220	ELETIVA	CC1966
221	ELETIVA	CC1967
222	ELETIVA	CC1968
223	ELETIVA	COMP405
224	ELETIVA	COMP406
225	ELETIVA	COMP407
226	ELETIVA	COMP409
227	ELETIVA	COMP410
228	ELETIVA	COMP411
229	ELETIVA	COMP412
230	ELETIVA	COMP413
231	ELETIVA	COMP414
\.


--
-- TOC entry 2997 (class 0 OID 19237)
-- Dependencies: 207
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users ("ID", email, matricula, name, picture, user_role) FROM stdin;
\.


--
-- TOC entry 3007 (class 0 OID 0)
-- Dependencies: 204
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 4, true);


--
-- TOC entry 3008 (class 0 OID 0)
-- Dependencies: 206
-- Name: modulos_idModulo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."modulos_idModulo_seq"', 1, false);


--
-- TOC entry 2854 (class 2606 OID 19246)
-- Name: disciplinas disciplinas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.disciplinas
    ADD CONSTRAINT disciplinas_pkey PRIMARY KEY (id_disciplina);


--
-- TOC entry 2856 (class 2606 OID 19248)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 2858 (class 2606 OID 19250)
-- Name: modulos modulos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modulos
    ADD CONSTRAINT modulos_pkey PRIMARY KEY (id_modulo);


--
-- TOC entry 2860 (class 2606 OID 19252)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_id_unique UNIQUE (id);


--
-- TOC entry 2862 (class 2606 OID 19254)
-- Name: users users_matricula_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_matricula_unique UNIQUE (matricula);


--
-- TOC entry 2864 (class 2606 OID 19256)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY ("email");


--
-- TOC entry 2865 (class 2606 OID 19257)
-- Name: modulos modulos_iddisciplina_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modulos
    ADD CONSTRAINT modulos_iddisciplina_foreign FOREIGN KEY (id_disciplina) REFERENCES public.disciplinas(id_disciplina);


-- Completed on 2022-06-09 09:33:21 -03

--
-- PostgreSQL database dump complete
--
