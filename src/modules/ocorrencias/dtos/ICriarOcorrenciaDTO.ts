export default interface ICriarOcorrenciaDTO {
  criador: number;
  alvo: string;
  descricao: string;
  situacao: string;
  datahora: Date;
  ocorrencia_tipo_id: number;
}
