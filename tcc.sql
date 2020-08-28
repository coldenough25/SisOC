--
-- PostgreSQL database dump
--

-- Dumped from database version 12.3
-- Dumped by pg_dump version 12.3

-- Started on 2020-08-28 16:46:32

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
-- TOC entry 209 (class 1259 OID 16678)
-- Name: ocorrencia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ocorrencia (
    id integer NOT NULL,
    descricao text NOT NULL,
    criador integer NOT NULL,
    alvo character varying(255) NOT NULL,
    data_hora timestamp without time zone NOT NULL,
    situacao character varying(255) NOT NULL,
    ot_id integer NOT NULL
);


ALTER TABLE public.ocorrencia OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 16676)
-- Name: ocorrencia_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ocorrencia_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ocorrencia_id_seq OWNER TO postgres;

--
-- TOC entry 2875 (class 0 OID 0)
-- Dependencies: 208
-- Name: ocorrencia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ocorrencia_id_seq OWNED BY public.ocorrencia.id;


--
-- TOC entry 211 (class 1259 OID 24799)
-- Name: ocorrencia_tipo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ocorrencia_tipo (
    id integer NOT NULL,
    nome character varying(255) NOT NULL,
    descricao character varying(255) NOT NULL,
    id_setor integer NOT NULL
);


ALTER TABLE public.ocorrencia_tipo OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 24797)
-- Name: ocorrencia_tipo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ocorrencia_tipo_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ocorrencia_tipo_id_seq OWNER TO postgres;

--
-- TOC entry 2876 (class 0 OID 0)
-- Dependencies: 210
-- Name: ocorrencia_tipo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ocorrencia_tipo_id_seq OWNED BY public.ocorrencia_tipo.id;


--
-- TOC entry 203 (class 1259 OID 16627)
-- Name: setor; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.setor (
    id integer NOT NULL,
    sigla character varying(16) NOT NULL,
    nome character varying(255) NOT NULL,
    email character varying(255) NOT NULL
);


ALTER TABLE public.setor OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16625)
-- Name: setor_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.setor_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.setor_id_seq OWNER TO postgres;

--
-- TOC entry 2877 (class 0 OID 0)
-- Dependencies: 202
-- Name: setor_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.setor_id_seq OWNED BY public.setor.id;


--
-- TOC entry 207 (class 1259 OID 16646)
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    id integer NOT NULL,
    nome character varying(50) NOT NULL,
    ra_siape character varying(7) NOT NULL,
    email character varying(255) NOT NULL,
    senha character varying(255) NOT NULL,
    id_tipo integer NOT NULL,
    id_setor integer
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 16644)
-- Name: usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_id_seq OWNER TO postgres;

--
-- TOC entry 2878 (class 0 OID 0)
-- Dependencies: 206
-- Name: usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_id_seq OWNED BY public.usuario.id;


--
-- TOC entry 205 (class 1259 OID 16638)
-- Name: usuario_tipo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario_tipo (
    id integer NOT NULL,
    nome character varying(16) NOT NULL,
    descricao character varying(255) NOT NULL
);


ALTER TABLE public.usuario_tipo OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16636)
-- Name: usuario_tipo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_tipo_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_tipo_id_seq OWNER TO postgres;

--
-- TOC entry 2879 (class 0 OID 0)
-- Dependencies: 204
-- Name: usuario_tipo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_tipo_id_seq OWNED BY public.usuario_tipo.id;


--
-- TOC entry 2718 (class 2604 OID 16681)
-- Name: ocorrencia id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ocorrencia ALTER COLUMN id SET DEFAULT nextval('public.ocorrencia_id_seq'::regclass);


--
-- TOC entry 2719 (class 2604 OID 24802)
-- Name: ocorrencia_tipo id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ocorrencia_tipo ALTER COLUMN id SET DEFAULT nextval('public.ocorrencia_tipo_id_seq'::regclass);


--
-- TOC entry 2715 (class 2604 OID 16630)
-- Name: setor id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.setor ALTER COLUMN id SET DEFAULT nextval('public.setor_id_seq'::regclass);


--
-- TOC entry 2717 (class 2604 OID 16649)
-- Name: usuario id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuario_id_seq'::regclass);


--
-- TOC entry 2716 (class 2604 OID 16641)
-- Name: usuario_tipo id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_tipo ALTER COLUMN id SET DEFAULT nextval('public.usuario_tipo_id_seq'::regclass);


--
-- TOC entry 2867 (class 0 OID 16678)
-- Dependencies: 209
-- Data for Name: ocorrencia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ocorrencia (id, descricao, criador, alvo, data_hora, situacao, ot_id) FROM stdin;
4	BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB	1	AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA	2020-08-21 00:33:00	EM ANÁLISE	6
\.


--
-- TOC entry 2869 (class 0 OID 24799)
-- Dependencies: 211
-- Data for Name: ocorrencia_tipo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ocorrencia_tipo (id, nome, descricao, id_setor) FROM stdin;
5	Infraestrutura	poskosdodiondionvikavnaokcomkxamc	2
6	Mau-uso do ambiente	AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA	3
9	dfadfafgaf	adovbjafobijfibjakfkadv	3
11	SOKAODSFADOJFIJAG	aaaa	1
\.


--
-- TOC entry 2861 (class 0 OID 16627)
-- Dependencies: 203
-- Data for Name: setor; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.setor (id, sigla, nome, email) FROM stdin;
1	NUGED	Núcleo de Gerenciamento de D	nuged@ifms.edu.br
2	CEREL	Central de Relacionamento	cerel@ifms.edu.br
3	COERI	Central de OERI	coeri@ifms.edu.br
\.


--
-- TOC entry 2865 (class 0 OID 16646)
-- Dependencies: 207
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario (id, nome, ra_siape, email, senha, id_tipo, id_setor) FROM stdin;
1	Pedro Fernandes	111111	pedrolechner10@gmail.com	308fb76dc4d730360ee33932d2fb1056	1	\N
\.


--
-- TOC entry 2863 (class 0 OID 16638)
-- Dependencies: 205
-- Data for Name: usuario_tipo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario_tipo (id, nome, descricao) FROM stdin;
1	ALUNO	Alunos do Instituto Federal de Mato Grosso do Sul, que possuem um Registro Acadêmico
2	SERVIDOR	Servidores do Instituto Federal de Mato Grosso do Sul, que possuem um SIAPE
4	OUTRO	Outros usuários, que não tem relação direta com o Instituto, nem desempenham funções nos Campus
\.


--
-- TOC entry 2880 (class 0 OID 0)
-- Dependencies: 208
-- Name: ocorrencia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ocorrencia_id_seq', 4, true);


--
-- TOC entry 2881 (class 0 OID 0)
-- Dependencies: 210
-- Name: ocorrencia_tipo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ocorrencia_tipo_id_seq', 11, true);


--
-- TOC entry 2882 (class 0 OID 0)
-- Dependencies: 202
-- Name: setor_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.setor_id_seq', 4, true);


--
-- TOC entry 2883 (class 0 OID 0)
-- Dependencies: 206
-- Name: usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_id_seq', 1, true);


--
-- TOC entry 2884 (class 0 OID 0)
-- Dependencies: 204
-- Name: usuario_tipo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_tipo_id_seq', 5, true);


--
-- TOC entry 2727 (class 2606 OID 16686)
-- Name: ocorrencia ocorrencia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT ocorrencia_pkey PRIMARY KEY (id);


--
-- TOC entry 2729 (class 2606 OID 24807)
-- Name: ocorrencia_tipo ocorrencia_tipo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ocorrencia_tipo
    ADD CONSTRAINT ocorrencia_tipo_pkey PRIMARY KEY (id);


--
-- TOC entry 2721 (class 2606 OID 16635)
-- Name: setor setor_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.setor
    ADD CONSTRAINT setor_pkey PRIMARY KEY (id);


--
-- TOC entry 2725 (class 2606 OID 16654)
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);


--
-- TOC entry 2723 (class 2606 OID 16643)
-- Name: usuario_tipo usuario_tipo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_tipo
    ADD CONSTRAINT usuario_tipo_pkey PRIMARY KEY (id);


--
-- TOC entry 2733 (class 2606 OID 24808)
-- Name: ocorrencia_tipo setor_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ocorrencia_tipo
    ADD CONSTRAINT setor_fk FOREIGN KEY (id_setor) REFERENCES public.setor(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 2732 (class 2606 OID 16692)
-- Name: ocorrencia usuario_criador_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ocorrencia
    ADD CONSTRAINT usuario_criador_fk FOREIGN KEY (criador) REFERENCES public.usuario(id) ON UPDATE CASCADE;


--
-- TOC entry 2731 (class 2606 OID 32947)
-- Name: usuario usuario_id_setor_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_id_setor_fkey FOREIGN KEY (id_setor) REFERENCES public.setor(id);


--
-- TOC entry 2730 (class 2606 OID 16655)
-- Name: usuario usuario_tipo_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_tipo_fk FOREIGN KEY (id_tipo) REFERENCES public.usuario_tipo(id) ON UPDATE CASCADE ON DELETE RESTRICT;


-- Completed on 2020-08-28 16:46:32

--
-- PostgreSQL database dump complete
--

