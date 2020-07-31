--
-- PostgreSQL database dump
--

-- Dumped from database version 12.3
-- Dumped by pg_dump version 12.3

-- Started on 2020-07-01 21:41:42

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
-- TOC entry 209 (class 1259 OID 16549)
-- Name: ocorrencia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ocorrencia (
    id_ocorrencia integer NOT NULL,
    criador character varying(50) NOT NULL,
    alvo character varying(50) NOT NULL,
    data_hora character varying(50) NOT NULL,
    descricao text NOT NULL,
    situacao character varying(20) NOT NULL,
    ot_id integer NOT NULL
);


ALTER TABLE public.ocorrencia OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 16547)
-- Name: ocorrencia_id_ocorrencia_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ocorrencia_id_ocorrencia_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ocorrencia_id_ocorrencia_seq OWNER TO postgres;

--
-- TOC entry 2861 (class 0 OID 0)
-- Dependencies: 208
-- Name: ocorrencia_id_ocorrencia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ocorrencia_id_ocorrencia_seq OWNED BY public.ocorrencia.id_ocorrencia;


--
-- TOC entry 205 (class 1259 OID 16506)
-- Name: ocorrencia_tipo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ocorrencia_tipo (
    id_ocorrencia_tipo integer NOT NULL,
    nome character varying(50) NOT NULL,
    setor character varying(20) NOT NULL,
    email character varying(35) NOT NULL,
    descricao text NOT NULL
);


ALTER TABLE public.ocorrencia_tipo OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16504)
-- Name: ocorrencia_tipo_id_ocorrencia_tipo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ocorrencia_tipo_id_ocorrencia_tipo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ocorrencia_tipo_id_ocorrencia_tipo_seq OWNER TO postgres;

--
-- TOC entry 2862 (class 0 OID 0)
-- Dependencies: 204
-- Name: ocorrencia_tipo_id_ocorrencia_tipo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ocorrencia_tipo_id_ocorrencia_tipo_seq OWNED BY public.ocorrencia_tipo.id_ocorrencia_tipo;


--
-- TOC entry 207 (class 1259 OID 16525)
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    id_usuario integer NOT NULL,
    nome character varying(50) NOT NULL,
    data_nascimento date NOT NULL,
    ra_siape bigint NOT NULL,
    ut_id integer NOT NULL
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 16523)
-- Name: usuario_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_id_usuario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_id_usuario_seq OWNER TO postgres;

--
-- TOC entry 2863 (class 0 OID 0)
-- Dependencies: 206
-- Name: usuario_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_id_usuario_seq OWNED BY public.usuario.id_usuario;


--
-- TOC entry 203 (class 1259 OID 16495)
-- Name: usuario_tipo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario_tipo (
    id_usuario_tipo integer NOT NULL,
    nome character varying(50) NOT NULL,
    descricao text NOT NULL
);


ALTER TABLE public.usuario_tipo OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16493)
-- Name: usuario_tipo_id_usuario_tipo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_tipo_id_usuario_tipo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_tipo_id_usuario_tipo_seq OWNER TO postgres;

--
-- TOC entry 2864 (class 0 OID 0)
-- Dependencies: 202
-- Name: usuario_tipo_id_usuario_tipo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_tipo_id_usuario_tipo_seq OWNED BY public.usuario_tipo.id_usuario_tipo;


--
-- TOC entry 2711 (class 2604 OID 16552)
-- Name: ocorrencia id_ocorrencia; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ocorrencia ALTER COLUMN id_ocorrencia SET DEFAULT nextval('public.ocorrencia_id_ocorrencia_seq'::regclass);


--
-- TOC entry 2709 (class 2604 OID 16509)
-- Name: ocorrencia_tipo id_ocorrencia_tipo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ocorrencia_tipo ALTER COLUMN id_ocorrencia_tipo SET DEFAULT nextval('public.ocorrencia_tipo_id_ocorrencia_tipo_seq'::regclass);


--
-- TOC entry 2710 (class 2604 OID 16528)
-- Name: usuario id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuario_id_usuario_seq'::regclass);


--
-- TOC entry 2708 (class 2604 OID 16498)
-- Name: usuario_tipo id_usuario_tipo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_tipo ALTER COLUMN id_usuario_tipo SET DEFAULT nextval('public.usuario_tipo_id_usuario_tipo_seq'::regclass);


--
-- TOC entry 2855 (class 0 OID 16549)
-- Dependencies: 209
-- Data for Name: ocorrencia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ocorrencia (id_ocorrencia, criador, alvo, data_hora, descricao, situacao, ot_id) FROM stdin;
2	teste	Teste	2020-07-01 17:16:10.678	Teste	Enviado	1
1	teste	Ar-Condicionado Bloco D206	2020-07-01 17:14:47.565	Ar-condicionado gotejando	Em análise	1
\.


--
-- TOC entry 2851 (class 0 OID 16506)
-- Dependencies: 205
-- Data for Name: ocorrencia_tipo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ocorrencia_tipo (id_ocorrencia_tipo, nome, setor, email, descricao) FROM stdin;
1	INFRAESTRUTURA	CEREL	CEREL@IFMS.EDU.BR	PROBLEMAS COM CONSTRUÇÕES
2	MAU USO DO AMBIENTE	CEREL	CEREL@IFMS.EDU.BR	USO INADEQUADO DE ESPAÇOS PÚBLICOS
3	DESENTENDIMENTOS	NUGED	NUGED@IFMS.EDU.BR	DESENTENDIMENTOS ENTRE ALUNOS E FUNCIONÁRIOS, OU ENTRE OS PRÓPRIOS ALUNOS
\.


--
-- TOC entry 2853 (class 0 OID 16525)
-- Dependencies: 207
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario (id_usuario, nome, data_nascimento, ra_siape, ut_id) FROM stdin;
1	teste	2001-01-01	123456	2
\.


--
-- TOC entry 2849 (class 0 OID 16495)
-- Dependencies: 203
-- Data for Name: usuario_tipo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario_tipo (id_usuario_tipo, nome, descricao) FROM stdin;
1	ALUNOS	ESTUDANTES DO INSTITUTO FEDERAL DE QUAISQUER TURNOS E MODOS DE ESTUDO
2	SERVIDORES	FUNCIONARIOS DO INSTITUTO FEDERAL DE QUAISQUER SETORES E FUNÇÕES
3	TERCEIRIZADOS	FUNCIONARIOS CONTRATADOS PELO IFMS PARA CUIDAR DE FUNÇÕES DESIGNADAS
\.


--
-- TOC entry 2865 (class 0 OID 0)
-- Dependencies: 208
-- Name: ocorrencia_id_ocorrencia_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ocorrencia_id_ocorrencia_seq', 2, true);


--
-- TOC entry 2866 (class 0 OID 0)
-- Dependencies: 204
-- Name: ocorrencia_tipo_id_ocorrencia_tipo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ocorrencia_tipo_id_ocorrencia_tipo_seq', 3, true);


--
-- TOC entry 2867 (class 0 OID 0)
-- Dependencies: 206
-- Name: usuario_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_id_usuario_seq', 1, true);


--
-- TOC entry 2868 (class 0 OID 0)
-- Dependencies: 202
-- Name: usuario_tipo_id_usuario_tipo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_tipo_id_usuario_tipo_seq', 3, true);


--
-- TOC entry 2719 (class 2606 OID 16557)
-- Name: ocorrencia ocorrencia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_pkey PRIMARY KEY (id_ocorrencia);


--
-- TOC entry 2715 (class 2606 OID 16514)
-- Name: ocorrencia_tipo ocorrencia_tipo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ocorrencia_tipo
    ADD CONSTRAINT ocorrencia_tipo_pkey PRIMARY KEY (id_ocorrencia_tipo);


--
-- TOC entry 2717 (class 2606 OID 16530)
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario);


--
-- TOC entry 2713 (class 2606 OID 16503)
-- Name: usuario_tipo usuario_tipo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_tipo
    ADD CONSTRAINT usuario_tipo_pkey PRIMARY KEY (id_usuario_tipo);


--
-- TOC entry 2721 (class 2606 OID 16558)
-- Name: ocorrencia ocorrencia_ot_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_ot_id_fkey FOREIGN KEY (ot_id) REFERENCES public.ocorrencia_tipo(id_ocorrencia_tipo);


--
-- TOC entry 2720 (class 2606 OID 16531)
-- Name: usuario usuario_ut_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_ut_id_fkey FOREIGN KEY (ut_id) REFERENCES public.usuario_tipo(id_usuario_tipo);


-- Completed on 2020-07-01 21:41:43

--
-- PostgreSQL database dump complete
--

